<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\ModelCRUDService;
use Illuminate\Support\Arr;

class CategoryController extends Controller
{
    private $crud;

    public function __construct(ModelCRUDService $crud)
    {
        $this->crud = $crud;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(20);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create', [
            'category' => new Category()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if (!Category::whereName($request->name)->first()) {
            $this->crud->create(new Category(), Arr::collapse([
                $request->validated(),
                ['slug' => str($request->name)->slug()]
            ]));
        }
        return redirect()->route('categories.index')->with('status', 'Category Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if (!Category::whereName($request->name)->first()) {
            $this->crud->update($category, Arr::collapse([
                $request->validated(),
                ['slug' => str($request->name)->slug()]
            ]));
        }
        return redirect()->route('categories.index')->with('status', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->crud->delete($category);
        return back()->with('status', 'Category Deleted');
    }
}
