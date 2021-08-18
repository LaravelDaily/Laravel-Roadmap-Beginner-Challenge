<?php

namespace App\Http\Controllers;

use App\Http\Requests\Panel\Category\CreateCategoryRequest;
use App\Http\Requests\Panel\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(10);
        return view('panel.category.index', compact('categories'));
    }

    public function create()
    {
        return view('panel.category.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        $data = $request->validated();
        $category = Category::create(
            $data
        );
        session()->flash('status', 'Category Created Successfully!');
        return back();
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('panel.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update(
            $data
        );
        session()->flash('status', 'Category Updated Successfully!');
        return redirect(route('categories.index'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('status', 'Category Deleted Successfully!');
        return back();
    }
}
