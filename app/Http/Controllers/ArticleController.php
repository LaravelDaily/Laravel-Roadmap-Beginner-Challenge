<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();

        if (isset($data['tags_ids'])) {
            $tags_ids = $data['tags_ids'];
            unset($data['tags_ids']);
        } else {
            $tags_ids = null;
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images');
        }
        
        $article = Article::create($data);

        if ($tags_ids) {
            $article->tags()->attach($tags_ids);
        }

        return redirect()->route('articles.show', $article);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.edit', compact('categories', 'tags', 'article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $data = $request->validated();

        if (isset($data['tags_ids'])) {
            $tags_ids = $data['tags_ids'];
            unset($data['tags_ids']);
        } else {
            $tags_ids = [];
        }

        if ($request->hasFile('image')) {
            if ($article->image && Storage::exists($article->image)) {
                Storage::delete($article->image);
            }
            $data['image'] = $request->file('image')->store('images');
        } elseif ($request->has('remove_image') && $article->image) {
            if (Storage::exists($article->image)) {
                Storage::delete($article->image);
            }
            $data['image'] = null;
        }
        
        $article->update($data);

        $article->tags()->sync($tags_ids);

        return redirect()->route('articles.show', $article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->image && Storage::exists($article->image)) {
            Storage::delete($article->image);
        }
        $article->delete();
        return redirect()->route('articles.index')->with('status', 'Article was successfully deleted!');
    }
}
