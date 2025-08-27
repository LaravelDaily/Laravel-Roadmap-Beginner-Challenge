<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $articles = Article::with('category')->latest()->paginate(10);

        return view('home', compact('articles'));
    }
}
