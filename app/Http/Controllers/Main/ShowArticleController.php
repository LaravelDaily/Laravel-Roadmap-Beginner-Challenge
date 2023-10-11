<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ShowArticleController extends Controller {
    public function __invoke(int $article_id) {
        $article = Article::select('id','title','fulltext','image','category_id','created_at')
                            ->with('category:id,name','tags:id,name')
                            ->find($article_id);
        if (!isset($article)) abort(404);
        return view('show', compact('article'));
    }
}