<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::query()->filter(request(['name', 'search']))->get();

        //$articles = Article::all();

        return view('guestpages.homepage', [
            'articles' => $articles
        ]);
    }

    public function show(Article $article)
    {

        return view('guestpages.show', [
            'article' => $article
        ]);
    }

}
