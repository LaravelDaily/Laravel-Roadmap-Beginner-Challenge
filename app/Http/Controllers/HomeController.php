<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __invoke()
    {
        $articles = Article::latest()->paginate(25);
        return view('article.index', compact('articles'));    
    }
    
}
