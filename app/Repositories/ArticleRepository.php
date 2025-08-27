<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository {

    public function articles(){
        return Article::latest()->get();
    }

    public function store(array $data){
        return Article::create($data);
    }

    public function update(array $data){
        return Article::create($data);
    }

    public function destroy($articleId){
        $article = Article::find($articleId);
        return $article->delete();
    }
}
