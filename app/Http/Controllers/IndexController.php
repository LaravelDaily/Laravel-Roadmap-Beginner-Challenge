<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class IndexController extends Controller
{
    public function index() {
        $articles = Article::with('category')->latest()->paginate(15);
        return view('index', compact('articles'));
    }

    public function show($id) {
        $article = Article::with('category')->findOrFail($id);
        return view('article', compact('article'));
    }
}
