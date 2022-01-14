<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class AdminCategoryController extends Controller
{


    public function index()
    {
        $categories = Category::with('posts')->simplePaginate(10);

        return view('admin.categories.index', compact(['categories']));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('categories.index')->with('success', 'Category has been created.');
    }


    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index')->with('success', 'category has been updated.');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category has been deleted.');
    }
}
