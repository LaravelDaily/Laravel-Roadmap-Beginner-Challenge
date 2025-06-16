<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("category.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required|unique:App\Models\Category|max:255",
        ]);

        Category::create([
            "name"=> $request->name 
        ]);
        session()->flash("success","Successfully created a new category.");
        return redirect()->route("admin.category.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "name"=> "required|unique:App\Models\Category|max:255",
        ]);

        $oldCategory = Category::findOrFail($id);
        $oldCategoryName = $oldCategory->name;
        $oldCategory->update($validated);
        session()->flash("success","Successfully updated the ". $oldCategoryName ." category.");
        return redirect()->route("admin.category.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        session()->flash("success","Successfully deleted the " .$category->name. " category");
        return redirect()->route("admin.category.index");
    }
}
