<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $articles = Article::withCount('tags')->latest()->paginate(5);

        return view('backend.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('backend.articles.create', compact('categories', 'tags'));
    }

    public function store(ArticleRequest $request)
    {
        if ($request->has('thumbnail')) {
            $validated = array_merge($request->validated(),['thumbnail' => $this->uploadImage($request->file('thumbnail'), 'article')]);
        }

        $article = Article::create($validated ?? $request->validated());

        $article->tags()->sync($request->tag_id);

        return redirect()->route('backend.articles.index')->with('success', 'Article created successfully!');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('backend.articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        if ($request->has('thumbnail')) {
            if ($article->thumbnail) {
                Storage::disk('public')->delete('uploads/images/article/' . $article->thumbnail);
            }
            $validated = array_merge($request->validated(),['thumbnail' => $this->uploadImage($request->file('thumbnail'), 'article')]);
        }

        $article->update($validated ?? $request->validated());

        $article->tags()->sync($request->tag_id);

        return redirect()->route('backend.articles.index')->with('success', 'Article updated successfully!');
    }

    public function destroy(Article $article)
    {
        if ($article->thumbnail) {
            Storage::disk('public')->delete('uploads/images/article/' . $article->thumbnail);
        }

        $article->tags()->detach();

        $article->delete();

        return redirect()->route('backend.articles.index')->with('success', 'Article deleted successfully!');
    }
}
