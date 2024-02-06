<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function __construct(){
        return $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->orderBy('created_at','desc')->get();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        return view('categories.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $formfields = $request->validated();

        Category::create($formfields);

        return to_route('categories.index')->with('success','la category a bien ete creer');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $posts = $category->posts()->get();

        return view('categories.show',compact('posts','category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $formfields = $request->validated();

        $category->update($formfields);

        return to_route('categories.index')->with('success','la category a bien ete modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return to_route('categories.index')->with('success','la category a bien ete suprimer');
    }
}
