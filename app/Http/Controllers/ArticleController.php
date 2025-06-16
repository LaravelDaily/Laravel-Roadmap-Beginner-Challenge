<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view("article.index", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("article.create", compact("categories","tags"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();
        $article = new Article();
        $article->title = $validated["title"];
        $article->body = $validated["body"];
        $article->category_id = $validated['category'];
        $article->save();

        $article->tags()->attach($validated['tags']);

        if($request->hasFile('image')) {
            $article->addMediaFromRequest('image')->toMediaCollection('article_images');
        }

        session()->flash('success','Successfully posted a new article.');

        return redirect()->route('admin.articles.index');
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
        $article = Article::findOrFail($id);
        $article->load(['category', 'media', 'tags']);
        $categories = Category::all();
        $tags = Tag::all();
        return view('article.edit', compact('article', 'tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {


        $article = Article::findOrFail($id);
        $validated = $request->validated();

        $article->title = $validated['title'];
        $article->body = $validated['body'];
        $article->category_id = $validated['category'];
        
        $article->save();

        $article->tags()->sync($validated['tags']);

        $imageEditAction = $request->input("image_edit_action");
    
        switch ($imageEditAction) {
            case 'replace':
                $article->clearMediaCollection('article_images');
                
                if (request()->hasFile('image')) {
                    $article->addMediaFromRequest('image')->toMediaCollection('article_images');
                }else{
                    $imgPath = $article->getFirstMedia('pending_article_images')->getPath();
                    $article->addMedia($imgPath)->toMediaCollection('article_images');
                }

                $article->clearMediaCollection('pending_article_images');
                $article->image_edit_action = null;
                $article->save();
                break;
            
            case 'keep':
                $article->clearMediaCollection('pending_article_images');
                $article->image_edit_action = null;
                $article->save();
                break;
                
            case 'delete':
                $article->clearMediaCollection('pending_article_images');
                $article->clearMediaCollection('article_images');
                $article->image_edit_action = null;
                $article->save();
                break;
            
            default:
                # code...
                break;
        }

        session()->flash('success','Successfully updated the specified article.');

        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);

        DB::transaction(function () use ($article) {
            $article->getFirstMedia('article_images')->delete();
            $article->delete();
        });
        
        session()->flash('success','Successfully deleted an article');
        return redirect()->route('admin.articles.index');
    }
}
