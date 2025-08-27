<?php

namespace App\Repositories;

use App\Models\ArticleTag;

class ArticleTagRepository {

    public function store(array $data){
        return ArticleTag::create($data);
    }

    public function deleteAllArticleTag($articleId){
        return ArticleTag::wherearticle_id($articleId)->delete();
    }

}
