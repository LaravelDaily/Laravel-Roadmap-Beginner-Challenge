<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::with(['category', 'tags'])->latest()->paginate(2);
        return view('articles', compact('articles'));
    }

    public function article($id)
    {
        $article = Article::findOrFail($id);
        return view('article_detail', compact('article'));
    }
}
