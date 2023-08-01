<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
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
        $articles = Article::paginate(5);   
        return view('pages.home', compact('articles'));
    }
    public function show(Article $article)
    {
        $art = Article::find($article->id);
        return view('pages.article.show', compact('art'));
    }
}
