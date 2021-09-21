<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        // return dd(auth()->user());
        return view('article.index');
    }

    public function create()
    {
        return view('article.create')
            ->with('categories', Category::all());
    }

    public function store(ArticleStoreRequest $request)
    {
        return $request->validated();
    }

    public function show(Article $article)
    {
    }

    public function edit(Article $article)
    {
    }

    public function update(Article $article)
    {
    }

    public function destroy(Article $article)
    {
    }
}
