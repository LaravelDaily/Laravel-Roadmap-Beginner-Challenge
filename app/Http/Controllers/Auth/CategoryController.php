<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create()
    {
        return view('auth.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50', 'unique:categories,name'],
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('category.created', '¡Categoría creada!');
    }
}
