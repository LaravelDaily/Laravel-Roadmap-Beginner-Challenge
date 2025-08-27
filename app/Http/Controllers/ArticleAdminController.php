<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\{
    Article,
    ArticleTag,
    Category,
    Tag,
};

use App\Http\Requests\ArticleValidationRequest;

class ArticleAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->sortBy('name');
        return \View::make('admin.articles.create')
            ->with([
                'categories' => $categories,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleValidationRequest $request)
    {
        if ($request->has('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename, 'public');
        }
        $article = Article::create([
            'title' => $request->input('title'),
            'text'  => $request->input('text'),
            'category_id' => $request->input('category_id'),
            'image_path' => $filename ?? "",
        ]);

        $tags = explode(',', $request->tags);
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        } 
        return redirect()->route('admin.articles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all()->sortBy('name');
        $tags = $article->tags->implode('name', ',');
        return view('admin.articles.edit', compact('article', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArticleValidationRequest  $request
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleValidationRequest $request, Article $article)
    {
        if ($request->has('image')) {
            Storage::delete('public/uploads/' . $article->image);
            
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename, 'public');
        }
        $article->where('id', $article->id)
            ->updateWithUserstamps([
                'title' => $request->input('title'),
                'text'  => $request->input('text'),
                'category_id' => $request->input('category_id'),
                'image_path' => $filename ?? $article->image_path,
            ]
        );
        $newTags = [];
        $tags = explode(',', $request->tags);
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            array_push($newTags, $tag->id);
        }
        $article->tags()->sync($newTags);
        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index');
    }
}
