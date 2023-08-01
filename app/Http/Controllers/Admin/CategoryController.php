<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(20);   
        return view('pages.category.index', compact('categories'));
    }

    public function edit(Category $category)
    {
        $cat = Category::find($category->id);
        return view('pages.category.edit', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories,name'
        ]);
        Category::create($validated);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|'.Rule::unique('categories')->ignore($category->id)
        ]);
        $category->update($validated);
        return redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        Category::find($category->id)->delete();
        return redirect()->back();
    }
}
