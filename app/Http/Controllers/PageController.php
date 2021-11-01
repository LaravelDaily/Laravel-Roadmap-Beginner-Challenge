<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $articles = Article::paginate(9);
        return view('index', compact('articles'));
    }

    public function show(Article $article){
        return view('show', compact('article'));
    }
}
