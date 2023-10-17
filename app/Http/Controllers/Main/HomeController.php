<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Article;

class HomeController extends Controller {
    public function __invoke() {
        $articles = Article::select('id','title','fulltext','image','category_id','created_at')
                            ->with('category:id,name','tags:id,name')
                            ->latest()
                            ->paginate(env('ARTICLES_PER_PAGE',10));
        return view('index', compact('articles'));
    }
}