<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect(route('categories.index'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect(route('categories.index'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect(route('categories.index'));
    }
}
