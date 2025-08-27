<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $getCategoryList = Category::paginate(7);

        return view('admin.category.index', compact('getCategoryList'));
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('admin.category.index')->with('success_message', 'Category has been created successfully!');
    }

    public function update(CategoryUpdateRequest $request, string $id)
    {
        $updateCategory = Category::findOrFail($id);
        $updateCategory->update($request->validated());
        if(!$updateCategory->wasChanged()) {
            $message = ['info_message' => 'You have not change anything. Nothing to update!'];
        } else {
            $message = ['success_message' => 'The category was successfully updated.'];
        }
        return redirect()->route('admin.category.index')->with($message);
    }

    public function destroy(string $id)
    {
        $category = Category::destroy($id);
        return redirect()->route('admin.category.index')->with(['success_message' => 'The category was successfully deleted.']);
    }
}
