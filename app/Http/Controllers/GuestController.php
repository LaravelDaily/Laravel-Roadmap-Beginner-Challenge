<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home()
    {
        return view('guest.home')
            ->with('articles', Article::with('category')->orderby('id', 'desc')->limit(3)->get());
    }

    public function show(Article $article)
    {
        return view('guest.show')
            ->with('article', Article::with('tags', 'category')->findOrFail($article->id));
    }

    public function about()
    {
        return view('guest.about');
    }
}
