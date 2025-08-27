<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(auth()->check() && request()->routeIs('articles.index')){
            $articles = auth()->user()->articles()->paginate(10);
            return view('articles.admin.index', compact('articles'));
        }else{
            $articles = Article::with(['category', 'tags'])->paginate(10);
            return view('articles.index', compact('articles'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        //
        $tags = explode(',', $request->tags);

        if ($request->has('image_path')) {
            $filename = time() . $request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->storeAs('uploads', $filename, 'public');
        }

        $article = auth()->user()->articles()->create([
            'title' => $request->title,
            'image_path' => $filename ?? null,
            'body' => $request->body,
            'category_id' => $request->category
        ]);

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        }

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
        return view('articles.show', compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
        $data = [
            'article' => $article,
            'categories' => Category::all(),
            'tags' => $article->tags->implode('name', ', '),
        ];

        return view('articles.admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        //
        $tags = explode(',', $request->tags);

        if ($request->has('image_path')) {
            Storage::delete('public/uploads/' . $article->image_path);

            $filename = time() . $request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->storeAs('uploads', $filename, 'public');
        }

        $article->update([
            'title' => $request->title,
            'image_path' => $filename ?? $article->image_path,
            'body' => $request->body,
            'category_id' => $request->category
        ]);

        $newTags = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            array_push($newTags, $tag->id);
        }
        $article->tags()->sync($newTags);

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
        if ($article->image_path) {
            Storage::delete('public/uploads/' . $article->image_path);
        }

        $article->tags()->detach();
        $article->delete();

        return redirect()->route('article.index');
    }
}
