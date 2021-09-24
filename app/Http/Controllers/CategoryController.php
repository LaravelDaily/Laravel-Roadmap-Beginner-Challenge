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
        return view('categories.index')
            ->with('categories', Category::orderBy('id', 'desc')->paginate(15));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('categories.edit')
            ->with('category', $category);
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        if ($category->articles()->count()) {
            return back()->withErrors(['error' => 'Cannot delete, category has articles.']);
        }

        $category->delete();

        return redirect()->route('categories.index');
    }
}
