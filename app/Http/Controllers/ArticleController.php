<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\View\View;
use Nette\Utils\Random;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.article.create', compact(['categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->validated());
        $article->tags()->sync($request->get('tags'));

        if ($request->hasFile('image')){
            $image = Random::generate(10) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $image);
            $article->update(['image' => $image]);
        }

        return redirect()->route('articles.show', $article)->with('status', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return View
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.article.edit', compact(['article', 'categories', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleRequest $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->validated());
        $article->tags()->sync($request->get('tags'));

        if ($request->hasFile('image')){
            $image = Random::generate(10) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $image);
            $article->update(['image' => $image]);
        }

        return redirect()->route('articles.show', $article)->with('status', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('status', 'Article deleted successfully!');
    }
}
