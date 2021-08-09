<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository {

    public function categories(){
        return Category::latest()->get();
    }

    public function store(array $data){
        return Category::create($data);
    }

    public function update(array $data, $categoryId){
        return Category::find($categoryId)->update($data);
    }

    public function delete($categoryId){
        $category = Category::find($categoryId);
        return $category->delete();
    }
}
