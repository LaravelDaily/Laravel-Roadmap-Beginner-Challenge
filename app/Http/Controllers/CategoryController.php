<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('pages.dashboard.category.category-index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.category.category-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->name = $request->category_name;
        try {
            $category->save();
            return redirect(route('category.index'));
        } catch (\Throwable $th) {
            if ($th->getCode() == '23000') {
                return back()->withErrors(['category_name' => 'The category already exist.']);
            }
            return back()->withErrors(['category_name' => 'Some error occur while try store the category name.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, $id)
    {
        $category = Category::find($id);
        return view('pages.category', ['category' => $category, 'articles' => $category->articles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            throw new NotFoundHttpException();
        }
        return view('pages.dashboard.category.category-edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $categoryName = Category::where('name', $request->category_name)->first();

        if ($categoryName) {
            return back()->withErrors(['category_name' => 'The category already exist.']);
        }
        $category = Category::find($id);
        $category->name = $request->category_name;

        try {
            $category->save();
            return redirect(route('category.index'));
        } catch (\Throwable $th) {
            return back()->withErrors(['category_name' => 'Some error occur while try store the category name.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            throw new NotFoundHttpException();
        }

        $category->delete();
        return redirect(route('category.index'));
    }
}
