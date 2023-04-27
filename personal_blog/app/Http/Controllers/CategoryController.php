<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    private $adminRoute;

    public function __construct()
    {
        $this->adminRoute = Category::$adminRoute;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(15);
        return view("$this->adminRoute.index", compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("$this->adminRoute.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        try {
            Category::create($validated);
            $message_type = 'success';
            $message = __('added successfully');
        } catch (\Exception $exception) {
            $code = $exception->getCode();
            $message = $exception->getMessage();
            return view('errors.custom-error', compact('message', 'code'));
        }
        return to_route("$this->adminRoute.index")->with($message_type, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("$this->adminRoute.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCategoryRequest $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        try {
            $category->update($validated);
            $message_type = 'success';
            $message = __('updated successfully');
        } catch (\Exception $exception) {
            $code = $exception->getCode();
            $message = $exception->getMessage();
            return view('errors.custom-error', compact('message', 'code'));
        }
        return to_route("$this->adminRoute.index")->with($message_type, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            Category::destroy($category->id);
            $message_type = 'success';
            $message = __('deleted successfully');
        } catch (\Exception $exception) {
            $code = $exception->getCode();
            $message = $exception->getMessage();
            return view('errors.custom-error', compact('message', 'code'));
        }
        return to_route("$this->adminRoute.index")->with($message_type, $message);
    }
}
