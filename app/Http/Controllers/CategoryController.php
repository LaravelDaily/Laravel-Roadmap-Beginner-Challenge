<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('articles')->latest()->paginate(5);

        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('backend.categories.index')->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        return view('backend.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('backend.categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        if ($category->articles()->count()) {
            return back()->with('error', 'This category has articles, you cannot delete this!');
        }

        $category->delete();

        return redirect()->route('backend.categories.index')->with('success', 'Category deleted successfully!');
    }
}
