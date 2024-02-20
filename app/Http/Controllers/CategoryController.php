<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


/**
 * CategoryController
 */
class CategoryController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.category.index', [
            'categorys' => Category::latest()->paginate(10),
        ]);
    }
        
    /**
     * show
     *
     * @param  mixed $category
     * @return View
     */
    public function show(Category $category): View 
    {
        return view('admin.category.show', [
            'category' => $category
        ]);
    }
    
    /**
     * edit
     *
     * @param  mixed $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }
        
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect(route('category.index', [
            'categories' => Category::latest()->paginate(10),
        ]))->with(['status' => 'Category added!']);
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $category
     * @return void
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect(route('category.show', $category))->with(['status' => 'category updated!']);
    }
}
