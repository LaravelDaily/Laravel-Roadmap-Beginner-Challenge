<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ListCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $categories = Category::orderByDesc('id')->paginate(5);

        return view('list.category', [
            'categories' => $categories,
        ]);
    }
}
