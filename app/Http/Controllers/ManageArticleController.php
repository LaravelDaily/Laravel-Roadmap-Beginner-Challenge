<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
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
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function store(Request $request, Faker $faker)
    {
        $attributes = $request->validate([
            'title' => ['required', 'string'],
            'text' => ['required', 'string', 'max:1000'],
            'image' => ['image'],
            'category_id' => ['required', 'numeric'],
            'tags' => ['array', 'max:3']
        ]);

        $article = Article::create(
            array_merge($attributes, [
                "image" => $request->file("image")
                    ? $request->file("image")->store("images")
                    : $faker->imageUrl(),
            ])
        );

        $article->tags()->sync($attributes["tags"]);

        return redirect()
            ->back()
            ->with("success", "Article Created!");
    }

    public function edit(Article $article)
    {
        return view('manage.article.edit', [
            'categories' => Category::all(),
            'article' => $article,
            'tags' => Tag::all()
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $attributes = $request->validate([
            'title' => ['required', 'string'],
            'text' => ['required', 'string', 'max:1000'],
            'image' => ['image'],
            'category_id' => ['required', 'numeric'],
            'tags' => ['array', 'max:3']
        ]);

        if ($attributes["image"] ?? false) {
            $attributes["image"] = $request->file("image")->store("images");
        }

        $article->update($attributes);
        $article->tags()->sync($attributes["tags"]);

        return back()->with('success', 'Article Updated!');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return back()->with('success', 'Article Deleted!');
    }
}
