<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index')
            ->with('categories', Category::all());
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('category.edit')
            ->with('category', $category);
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        if ($category->articles()->count()) {
            return back()->withErrors(['error' => 'Cannot delete, category has articles.']);
        }

        $category->delete();

        return redirect()->route('category.index');
    }
}
