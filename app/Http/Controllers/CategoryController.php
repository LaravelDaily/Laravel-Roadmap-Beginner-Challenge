<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);

        return view('categories.index', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        Category::create($validatedData);

        session()->flash('createdSuccess', [
            'message' => 'Category created!',
        ]);

        return redirect()->route('category.index');
    }

    public function create()
    {
        return view('categories.create');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = Category::find($id);
        $oldName = $category->name; //para manipulação da mensagem de sucesso

        $category->update($validatedData);
        $newName = $category->name; //para manipulação da mensagem de sucesso

        // Armazenar dados na sessão
        session()->flash('updatedSuccess', [
            'message' => 'Category updated!',
            'oldName' => $oldName,
            'newName' => $newName,
        ]);

        return redirect()->route('category.index');
    }

    public function destroy($id): RedirectResponse
    {
        $category = Category::find($id);

        if ($category) {
            $category->delete();

            // Armazenar dados na sessão
            session()->flash('deletedSuccess', [
                'message' => 'Category deleted!',
            ]);

            return redirect()->route('category.index');
        }

        return redirect()->route('category.index')->with('error', 'Category not found');
    }
}
