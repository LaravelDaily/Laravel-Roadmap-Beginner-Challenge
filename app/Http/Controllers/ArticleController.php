<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category','tags')->paginate(10);

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.index', compact('article'));
    }

    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('articles.create', compact('categories','tags'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('articles.edit', compact('categories','tags', 'article'));
    }

    public function store(StoreArticleRequest $request)
    {
        // Store new image file
        if($request->hasFile('photo')) {
            $photo = $request->file('photo')->store(options: 'articles');
        }

        // Create new article record and assign to $article
        $article = Article::create([
            'title' => $request->validated('title'),
            'category_id' => $request->validated('category'),
            'article' => $request->validated('article'),
            'photo' => $photo ?? null,
        ]);

        // Sync pivot table relationship
        $article->tags()->sync($request->validated('tags'));

        return to_route('articles.index');
    }

    public function update(Article $article, StoreArticleRequest $request)
    {
        // Store new image file
        if($request->hasFile('photo')) {
            $photo = $request->file('photo')->store(options: 'articles');
        }

        // Delete old file if it exists
        if($article->photo !== null && Storage::disk('articles')->exists($article->photo)) {
            Storage::disk('articles')->delete($article->photo);
        }

        $article->update([
            'title' => $request->validated('title'),
            'category_id' => $request->validated('category'),
            'article' => $request->validated('article'),
            'photo' => $photo ?? null,
        ]);

        // Sync pivot table relationship
        $article->tags()->sync($request->validated('tags'));

        return to_route('articles.index');
    }

    public function destroy(Article $article)
    {
        // Delete photo file if it exists
        if($article->photo !== null && Storage::disk('articles')->exists($article->photo)) {
            Storage::disk('articles')->delete($article->photo);
        }

        $article->delete();
        
        return to_route('articles.index');
    }
}
