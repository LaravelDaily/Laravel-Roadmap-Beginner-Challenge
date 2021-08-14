<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('categories.index', ['categories' => Category::with('articles')->paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create($request->all());
        return redirect()->route('category.index')->with(['message' => 'Successfully created']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        return view('categories.edit', ['category' => Category::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, int $id): RedirectResponse
    {
        Category::findOrFail($id)->update($request->all());
        return redirect()->route('category.index')->with(['message' => 'Successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('category.index')->with(['message' => 'Successfully deleted']);
    }
}
