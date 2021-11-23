<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        return view('article.index', [
            'articles' => Article::latest()->paginate(3)
        ]);
    }

    public function show(Article $article)
    {
        return view('article.show', [
            'article' => $article
        ]);
    }
}
