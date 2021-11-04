<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category','tags'])->paginate();

        foreach ($articles as $article) {
            $article->image_url = $article->image ? Storage::url($article->image)
            : Storage::url('articles/no-photo.jpg');
        }

        return view('home', compact('articles'));
    }


    public function article(Article $article)
    {
        $article->image_url = $article->image ? Storage::url($article->image)
                    : Storage::url('articles/no-photo.jpg');
                    
        $latestArticles = Article::latest()->take(5)->get();

        return view('single', compact('article','latestArticles'));
    }

}
