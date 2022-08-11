<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::with('category','tags')->orderBy('created_at', 'desc')->paginate(6);
        return view('homepage', compact('articles'));
    }
}
