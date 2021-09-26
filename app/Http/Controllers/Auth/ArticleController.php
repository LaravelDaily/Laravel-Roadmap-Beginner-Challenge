<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);

        return view('auth.articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('auth.articles.show', compact('article'));
    }

    public function create()
    {
        return view('auth.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'image' => ['nullable', 'image'],
        ]);

        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->hasFile('image') ? $request->file('image')->store('articles') : null,
        ]);

        $request->user()->articles()->save($article);

        return redirect(route('auth.articles.edit', $article))->with('article.created', 'Your article was created!');
    }

    public function edit(Article $article)
    {
        return view('auth.articles.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $request->has('image') ?
            $article->update(array_merge(
                $request->validated(),
                ['image' => $request->file('image')->store('/')]
            )) :
            $article->update($request->validated());

        if ($request->has('tags')) {
            $article->tags()->attach($request->tags);
        }

        return redirect()->back();
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back();
    }
}
