<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with(['category'])->paginate(10);

        return view('pages.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.article.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = Article::create([
            'title' => $request->title,
            'full_text' => $request->full_text,
            'category_id' => $request->category,
        ]);

        foreach ($request->tags as $tagId) {
            $article->tags()->attach($tagId);
        }

        if ($request->image) {
            $article->addMediaFromRequest('image')->toMediaCollection();
        }

        return to_route('articles.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article = Article::with(['category', 'tags'])->findOrFail($article->id);

        return view('pages.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.article.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update([
            'title' => $request->title,
            'full_text' => $request->full_text,
            'category_id' => $request->category,
        ]);

        $article->tags()->detach();

        foreach ($request->tags as $tagId) {
            $article->tags()->attach($tagId);
        }

        if ($request->image) {
            if ($article->hasMedia()) {
                $article->getFirstMedia()->delete();
            } 
            $article->addMediaFromRequest('image')->toMediaCollection();
        }
        return to_route('articles.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->tags()->detach();

        $article->delete();

        return to_route('articles.index');
    }
}
