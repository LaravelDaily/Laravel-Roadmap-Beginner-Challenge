<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public function index(): View
    {
        $categories = Category::latest()->paginate(10);

        return view('auth.categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('auth.categories.create');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:50', 'unique:categories'],
        ]);

        $category = Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('auth.categories.edit', $category)->with('category.created', 'Category Created!');
    }

    public function edit(Category $category): View
    {
        return view('auth.categories.edit', compact('category'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'name' => ['required' , 'max:50', 'unique:categories'],
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->back()->with('category.updated', 'Category Updated!');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->back()->with('category.destroyed', "Category {$category->name} was deleted!");
    }
}
