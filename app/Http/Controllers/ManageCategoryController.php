<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ManageCategoryController extends Controller
{
    public function index()
    {
        return view('manage.category.index', [
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('manage.category.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:15']
        ]);

        Category::create($attributes);

        return redirect()
            ->back()
            ->with("success", "Category Created!");
    }

    public function edit(Category $category)
    {
        return view('manage.category.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:15']
        ]);

        $category->update($attributes);

        return back()->with('success', 'Category Updated!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', 'Category Deleted!');
    }
}
