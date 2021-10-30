<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Article;
use Faker\Generator as Faker;

class ManageArticleController extends Controller
{
    public function index()
    {
        return view('manage.article.index', [
            'articles' => Article::all()
        ]);
    }

    public function create()
    {
        return view('manage.article.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request, Faker $faker)
    {
        $attributes = $request->validate([
            'title' => ['required', 'string'],
            'text' => ['required', 'string', 'max:1000'],
            'image' => ['image'],
            'category_id' => ['required', 'numeric'],
        ]);

        Article::create(
            array_merge($attributes, [
                "image" => $request->file("image")
                    ? $request->file("image")->store("images")
                    : $faker->imageUrl(),
            ])
        );

        return redirect()
            ->back()
            ->with("success", "Article Created!");
    }

    public function edit(Category $category)
    {
        return view('manage.category.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:15']
        ]);

        $category->update($attributes);

        return back()->with('success', 'Category Updated!');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return back()->with('success', 'Article Deleted!');
    }
}
