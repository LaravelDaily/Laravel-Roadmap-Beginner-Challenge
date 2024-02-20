<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): View
    {
    
        return view('admin.category.index', [
            'categorys' => Category::latest()->paginate(10),
        ]);
    }
    public function show(Category $category): View 
    {
        return view('admin.category.show', [
            'category' => $category
        ]);
    }
    public function edit(Category $category): View
    {
    
        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }
    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect(route('category.index', [
            'categories' => Category::latest()->paginate(10),
        ]))->with(['status' => 'Category added!']);
    }
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect(route('category.show', $category))->with(['status' => 'category updated!']);
    }
}
