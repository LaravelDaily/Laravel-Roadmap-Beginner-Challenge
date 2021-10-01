<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return view('auth.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('auth.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50', 'unique:categories'],
        ]);

        $category = Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('auth.categories.edit', $category)->with('category.created', 'Category Created!');
    }

    public function edit(Category $category)
    {
        return view('auth.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required' , 'max:50', 'unique:categories'],
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->back()->with('category.updated', 'Category Updated!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('category.destroyed', "Category {$category->name} was deleted!");
    }
}
