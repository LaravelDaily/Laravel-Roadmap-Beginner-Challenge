<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryRepository $categoryRepository)
    {
        return view('category.index')->with('categories',$categoryRepository->categories());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CategoryService $categoryService)
    {
        $validated = $this->validate($request, [
            'name' => 'required|string|max:255|unique:categories,name'
        ]);
        try{
            $categoryService->store($validated);
            return redirect(route('categories.index'))->with('alert-success', 'Category Successfully Created');
        }catch(\Throwable $e){
            Log::error([
                get_class($this) . 'store with params ' . json_encode($request->all()),
                'Message ' . $e->getMessage(),
                'On line ' . $e->getLine(),
            ]);
            return back()->with('alert', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, CategoryService $categorieservice)
    {
        $validated = $this->validate($request, [
            'name' => 'required|string|max:255|unique:categories,name'
        ]);

        try{
            $categorieservice->update($validated, $category);
            return redirect(route('categories.index'))->with('categories Successfully Updated');
        }catch(\Throwable $e){
            Log::error([
                get_class($this) . 'update with params ' . json_encode($request->all()),
                'Message ' . $e->getMessage(),
                'On line ' . $e->getLine(),
            ]);
            return back()->with('alert', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,CategoryService $categorieservice)
    {
        try{
            $categorieservice->delete($category);
            return redirect(route('categories.index'))->with('alert-success', 'Category Successfully Deleted');
        }catch(\Throwable $e){
            Log::error([
                get_class($this) . 'delete',
                'Message ' . $e->getMessage(),
                'On line ' . $e->getLine(),
            ]);
            return back()->with('alert', $e->getMessage())->withInput();
        }
    }
}
