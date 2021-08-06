<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('pages.category.index', [
            'categories' => Category::withCount('posts')->latest()->paginate(10)
        ]);
    }

    public function show(Category $category)
    {
        // No need to show bcz of having only 1 column.
        return redirect()->route('category.index');
    }

    public function create()
    {
        return view('pages.category.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('category.index')->with(['success' => 'Create success']);
    }

    public function edit(Category $category)
    {
        return view('pages.category.edit', ['category' => $category]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('category.index')->with(['success' => 'Edit success']);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with(['success' => 'Delete success']);
    }
}
