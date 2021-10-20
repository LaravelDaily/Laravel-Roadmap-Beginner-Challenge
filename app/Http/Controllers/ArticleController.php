<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ArticleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::latest()->get()->map(function (Article $article) {
            return [
                'key' => $article->id,
                'title' => $article->title,
                'body' => $article->body,
                'image' => $article->image ?: null,
                'tags' => $article->tags->pluck('title'),
                'tag_ids' => $article->tags->pluck('id'),
                'category' => $article->category ? $article->category->title : null,
                'category_id' => $article->category_id ?: null
            ];
        });

        $categories = Category::orderBy('title')->get()->map(function (Category $category) {
            return [
                'value' => $category->id,
                'label' => $category->title,
            ];
        });

        $tags = Tag::orderBy('title')->get()->map(function (Tag $tag) {
            return [
                'value' => $tag->id,
                'label' => $tag->title,
            ];
        });

        return Inertia::render('Backend/Articles/ArticleList', compact('articles', 'categories', 'tags'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('article.create');
    }

    /**
     * @param \App\Http\Requests\ArticleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleStoreRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
        }

        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $image ?? null,
            'category_id' => $request->category_id,
        ]);

        $article->tags()->attach($request->tag_ids);

        $request->session()->flash('message', [
            'type' => 'success',
            'text' => 'Article created successfully.',
        ]);

        return redirect()->route('articles.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * @param \App\Http\Requests\ArticleUpdateRequest $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $image = $request->file('image')->store('images', 'public');

            $article->update([
                'image' => $image
            ]);
        }

        $article->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);

        $article->tags()->sync($request->tag_ids);

        $request->session()->flash('message', [
            'type' => 'success',
            'text' => 'Article updated successfully.',
        ]);

        return redirect()->route('articles.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Article $article)
    {
        Storage::disk('public')->delete($article->image);

        $article->delete();

        $request->session()->flash('message', [
            'type' => 'success',
            'text' => 'Article deleted successfully.',
        ]);

        return redirect()->route('articles.index');
    }
}
