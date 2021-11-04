<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with(['category','tags'])->paginate();

        foreach ($articles as $article) {
            $article->image_url = $article->image ? Storage::url($article->image)
            : Storage::url('articles/no-photo.jpg');
        }

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');

        return view('articles.create',compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'title' => 'required|max:255',
            'full_text' => 'required',
            'category_id' => 'nullable|integer',
            'tags' => 'array',
            'tags.*' => 'integer',
            'image' => 'nullable|mimes:jpeg,png,jpg,svg',
        ]);

        $article = Article::create($validated);

        if($request->hasFile('image')) {
            $article->image = $request->file('image')->storePublicly('articles','public');
            $article->save();
        }

        $article->tags()->sync($request->input('tags', []));

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return redirect()->route('articles.view', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');

        $article->image_url = $article->image ? Storage::url($article->image)
                    : Storage::url('articles/no-photo.jpg');
        return view('articles.edit', compact('article','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validated = $this->validate($request, [
            'title' => 'required|max:255',
            'full_text' => 'required',
            'category_id' => 'nullable|integer',
            'tags' => 'array',
            'tags.*' => 'integer',
            'image' => 'nullable|mimes:jpeg,png,jpg,svg',
        ]);

        if ($request->hasFile('image')) {
            if ($article->image) Storage::disk('public')->delete($article->image);
            $article->image = $request->file('image')->storePublicly('articles','public');
        }

        $article->update($validated);

        $article->tags()->sync($request->input('tags', []));

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Storage::disk('public')->delete($article->image);
        $article->tags()->detach();
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function deleteImage(Article $article)
    {
        Storage::disk('public')->delete($article->image);
        $article->image = null;
        $article->update();
        return response()->json(['status' => 'Successfully deleted!']);
    }
}
