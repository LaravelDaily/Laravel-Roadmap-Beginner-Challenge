<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index($id)
    {
        $category = Category::with('posts')->findOrFail($id);
        return view('categories.index', compact('category'));
    }
}
