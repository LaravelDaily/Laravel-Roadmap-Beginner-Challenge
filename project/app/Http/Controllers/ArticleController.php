<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('author', 'category', 'tags')->paginate(8);
        // return $articles;
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'full_text' => 'required'
        ]);

        $article = new Article();

        $article->title = $request->title;
        $article->full_text = $request->full_text;
        if ($request->has('category'))
            $article->category_id = $request->category;
        $article->user_id = auth()->id();
        $article->save();
        if (!empty($request->tags))
            $article->tags()->attach($request->tags);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store("imgs/$article->id");
            $article->image_url = $path;
        }
        $article->save();
        return redirect()->route('articles.index')->with('success', 'Article Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {

        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.edit', ['article' => $article, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required',
            'full_text' => 'required'
        ]);

        $article->title = $request->title;
        $article->full_text = $request->full_text;
        if ($request->has('category'))
            $article->category_id = $request->category;
        $article->user_id = auth()->id();
        $article->save();
        $article->tags()->detach();
        if (!empty($request->tags))
            $article->tags()->attach($request->tags);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store("imgs/$article->id");
            $article->image_url = $path;
        }
        $article->save();
        return redirect()->route('articles.index')->with('success', 'Article Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article Deleted Successfully');
    }
}
