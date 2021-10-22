<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $articles = Article::all();
        return view('index', compact('articles'));
    }

    public function show(int $id){
        $article = Article::with(['category', 'tags'])->findOrFail($id);
        return view('show', compact('article'));
    }
}
