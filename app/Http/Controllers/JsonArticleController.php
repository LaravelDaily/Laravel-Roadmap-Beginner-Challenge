<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;

class JsonArticleController extends Controller
{
    public function index()
    {
        return ArticleResource::collection(Article::all());
    }

    public function show(Article $article)
    {
        return ArticleResource::make($article)->resolve();
    }
}
