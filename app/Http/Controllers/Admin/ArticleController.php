<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\Admin\CreateArticleRequest;
use App\Services\TagsForArticle;
use Illuminate\Support\Facades\DB;
use App\Helpers\TimestampHelper;
use App\Helpers\FilesystemHelper;
use App\Http\Requests\Admin\EditArticleRequest;

class ArticleController extends Controller {
    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::select('id','name')->get();
        $allTags = Tag::select('id','name')->get();
        return view('admin.articles.create', compact('categories','allTags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateArticleRequest $request) {
        $tags = TagsForArticle::fetchTagsFromRequest();
        if ($request->has('image')) {
            $filename = TimestampHelper::getFileTimestamp() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('', $filename, FilesystemHelper::DISK_FOR_UPLOADS);
        }
        DB::beginTransaction();
        $article = Article::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'fulltext' => $request->fulltext,
            'image' => $request->has('image') ? FilesystemHelper::DISK_FOR_UPLOADS . '/' . $filename : null 
        ]);
        $article->tags()->sync($tags);
        DB::commit();
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article) {
        $categories = Category::select('id','name')->get();
        $allTags = Tag::select('id','name')->get();
        $tagIds = $article->tags()->get()->pluck('id')->toArray();
        return view('admin.articles.edit', compact('article', 'categories', 'allTags', 'tagIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditArticleRequest $request, Article $article) {
        $tags = TagsForArticle::fetchTagsFromRequest();
        if ($request->image_confirmation && $request->has('image')) {
            $filename = TimestampHelper::getFileTimestamp() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('', $filename, FilesystemHelper::DISK_FOR_UPLOADS);
        }
        DB::beginTransaction();
        $fields = [
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'fulltext' => $request->fulltext
        ];
        if ($request->image_confirmation) {
            $fields['image'] = $request->has('image') ? FilesystemHelper::DISK_FOR_UPLOADS . '/' . $filename : null;
        }
        $article->update($fields);
        $article->tags()->sync($tags);
        DB::commit();
        return redirect()->route('home');
   }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article) {
        $article->delete();
        return redirect()->route('home');
    }

    /*
        Dear Reader:
        You might be wondering how the unused images are actually discarded.
        So.. for this answer --
        Please check: App\Console\Commands\PurgeGarbageImages.php
    */
}