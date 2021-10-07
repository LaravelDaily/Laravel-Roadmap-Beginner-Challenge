<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::latest()->paginate(10);

        return view('auth.articles.index', compact('articles'));
    }

    public function show(Article $article): View
    {
        return view('auth.articles.show', compact('article'));
    }

    public function create(): View
    {
        return view('auth.articles.create');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
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

    public function edit(Article $article): View
    {
        $categories = Category::get()->except(optional($article->category)->id);
        $tags = Tag::get()->except($article->tags->pluck('id')->toArray());

        return view('auth.articles.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
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

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->back()->with('article.destroyed', "Article {$article->title} was deleted!");
    }
}
