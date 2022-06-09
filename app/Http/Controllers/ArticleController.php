<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::select(['id','title','file_path','category_id'])->with('category')->latest()->simplePaginate(6);
        return view('article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories=Category::select(['id','name'])->get();
        return view('article.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $validated=$request->validated();
        //UPLOAD IMAGES TO STORAGE/IMAGES
        $file_path=empty($validated['file_path'])?null:'storage/'.$validated['file_path']->store('images','public');
        //CREATE ARTICLES
        $article=Article::create([
            'title'=>$validated['title'],
            'text'=>$validated['text'],
            'file_path'=>$file_path,
            'category_id'=>$validated['category_id']
        ]);

        //CREATE AND ATTACH TAGS TO ARTICLES
        if (!empty($request->sanitizedTags())) {
            foreach ($request->sanitizedTags() as $value) {            
                Tag::firstOrCreate(['name'=>$value])->articles()->attach($article);
            }
        }

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories=Category::select(['id','name'])->get();
        return view('article.edit',compact('article','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validated=$request->validated();
        //UPLOAD IMAGES TO STORAGE/IMAGES
        $file_path=empty($validated['file_path'])?$article->file_path:'storage/'.$validated['file_path']->store('images','public');
        //UPDATE ARTICLES
        $article->update([
            'title'=>$validated['title'],
            'text'=>$validated['text'],
            'file_path'=>$file_path,
            'category_id'=>$validated['category_id']
        ]);
        //CREATE AND ATTACH TAGS TO ARTICLES
        if (!empty($request->sanitizedTags())) {
            foreach ($request->sanitizedTags() as $value) {            
                Tag::firstOrCreate(['name'=>$value])->articles()->attach($article);
            }
        }
        return redirect()->route('article.show',$article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index');
    }
}
