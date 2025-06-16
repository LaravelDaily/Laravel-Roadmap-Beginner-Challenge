<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ListArticleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $articles = Article::with(['category', 'user'])->orderByDesc('id')->paginate(5);

        return view('list.article', [
            'articles' => $articles,
        ]);
    }
}
