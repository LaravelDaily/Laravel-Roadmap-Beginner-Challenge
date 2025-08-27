<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminArticleController extends Controller
{

    public function index(Request $request)
    {

        $articles = Article::query()->where('user_id', $request->user()->id)->filter(request(['name', 'search']))->get();

        return view('adminpages.homepage', [
            'articles' => $articles
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        //$tags = Tag::query()->filter(request(['name', 'search']))->get();

        return view('adminpages.article-create', ['categories' => $categories]);
    }

    public function store(StoreArticleRequest $request)
    {

        $tags = explode(',', $request->tags);
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $filename = time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $filename, 'public');
            $validatedData['image'] = $filename;
        };

        $article = Article::create(array_merge($validatedData, [
            'user_id' => auth()->id()
        ]));


        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        }

        return redirect()->route('admin-page.index');
    }


    public function edit(Article $article)
    {
        $tags = $article->tags->implode('name', ', ');
        $categories = Category::all();

        return view('adminpages.edit', compact('article', 'tags', 'categories'));

        //return view('adminpages.edit')->with('article', $article)->with('categories', $categories);

    }


    public function update(UpdateArticleRequest $request, Article $article)
    {
        $tags = explode(',', $request->tags);

        if ($request->hasFile('image')) {
            if($article->image){
                Storage::delete('public/images/' . $article->image);
            }
            $filename = time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $filename, 'public');
        };

        $article->update([
            'title' => $request->title,
            'image' => $filename ?? $article->image,
            'body' => $request->body,
            'category_id' => $request->category_id
        ]);

        $newTags = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            array_push($newTags, $tag->id);
        }
        $article->tags()->sync($newTags);

        return redirect()->route('admin-page.index');
    }


    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::delete('public/images/' . $article->image);
        }


        $article->delete();
        return redirect()->route('admin-page.index');
    }
}
