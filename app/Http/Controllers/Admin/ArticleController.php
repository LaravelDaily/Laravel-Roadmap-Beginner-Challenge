<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $getArticleList = Article::orderByDesc('id')->with('category', 'author')->paginate(10);
        return view('admin.article.index', compact('getArticleList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('admin.article.create', compact(['categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleStoreRequest $request): RedirectResponse
    {
        $filename = uniqid() . '.' . $request->file('image')->extension();

        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->slug = Str::slug($request->input('slug'));
        $article->image = $filename;
        $article->category_id = $request->input('category');
        $article->user_id = auth()->id();
        $article->save();
        if (!empty($request->input('tag'))) {
            $article->tags()->attach($request->input('tag'));
        }
        $uploadedImg = $request->file('image')->storeAs('article/images', $filename, 'public');
        Image::make(storage_path('app/public/' . $uploadedImg))->resize(550, 300)->save();


        return redirect()->route('admin.article.index')->with('success_message', 'Article has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::with(['category', 'tags'])->findOrFail($id);
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('admin.article.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleUpdateRequest $request, string $id)
    {

        $article = Article::findOrFail($id);
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->slug = Str::slug($request->input('slug'));
        $article->category_id = $request->input('category');
        $article->user_id = auth()->id();
        if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $request->file('image')->extension();
            Storage::disk('public')->delete('article/images/' . $article->image);
            $article->image = $filename;
            $uploadedImg = $request->file('image')->storeAs('article/images', $filename, 'public');
            Image::make(storage_path('app/public/' . $uploadedImg))->resize(550, 300)->save();
        }
        $article->save();

        if (!empty($request->input('tag'))) {
            $article->tags()->sync($request->input('tag'));
        }

        return redirect()->route('admin.article.index')->with(['success_message' => 'The article was successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        $article->tags()->detach();
        Storage::disk('public')->delete('article/images/' . $article->image);
        $article->delete();
        return redirect()->route('admin.article.index')->with(['success_message' => 'The category was successfully deleted.']);
    }
}
