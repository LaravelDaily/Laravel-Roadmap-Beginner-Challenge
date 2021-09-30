<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
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
        $categories = Category::get()->except(optional($article->category)->id);
        $tags = Tag::get()->except($article->tags->pluck('id')->toArray());

        return view('auth.articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $request->has('image') ?
            $article->update(array_merge(
                $request->only(['title', 'body', 'category_id']),
                ['image' => $request->file('image')->store('articles')]
            )) :
            $article->update($request->only(['title', 'body', 'category_id']));

        $article->tags()->syncWithoutDetaching($request->added_tags);

        if ($request->removed_tags) {
            $article->tags()->detach($request->removed_tags);
        }

        return redirect()->back()->with('article.updated', 'Article Updated!');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back()->with('article.destroyed', "Article {$article->title} was deleted!");
    }
}
