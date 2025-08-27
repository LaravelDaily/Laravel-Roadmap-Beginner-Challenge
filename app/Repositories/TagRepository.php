<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository {

    public function tags(){
        return Tag::latest()->get();
    }

    public function store(array $data){
        return Tag::create($data);
    }

    public function update(array $data, $tagId){
        return Tag::find($tagId)->update($data);
    }

    public function delete($tagId){
        $tag = Tag::find($tagId);
        return $tag->delete();
    }
}
