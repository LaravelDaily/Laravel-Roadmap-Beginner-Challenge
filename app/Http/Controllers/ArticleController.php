<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index')
            ->with('articles', Article::with('category')->orderBy('id', 'desc')->paginate(10));
    }

    public function create()
    {
        return view('articles.create')
            ->with('categories', Category::all());
    }

    public function store(ArticleStoreRequest $request)
    {
        if ($request->has('image')) {
            $request->file('image')->storeAs(
                'uploads',
                $fileName = Helper::generateRandomString() . '.' . $request->file('image')->getClientOriginalExtension(),
                'public'
            );
        }

        $article = Article::create(array_merge(
            $request->validated(),
            ['image' => $fileName ?? null, 'user_id' => auth()->user()->id]
        ));

        $tags = explode(',', $request->tags);
        foreach ($tags as $tag) {
            $article->tags()->attach(Tag::select('id')->where('name', $tag)->get());
        }

        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        return view('articles.show')
            ->with('article', Article::with('tags', 'category')->findOrFail($article->id));
    }

    public function edit(Article $article)
    {
        return view('articles.edit')
            ->with('article', $article = Article::with('tags', 'category')->findOrFail($article->id))
            ->with('tags', ArticleService::getArticleTagsToString($article->tags))
            ->with('categories', Category::all());
    }

    public function update(ArticleUpdateRequest $request, Article $article)
    {
        if ($request->has('image')) {
            Storage::delete('public/uploads/' . $article->image);

            $request->file('image')->storeAs(
                'uploads',
                $fileName = Helper::generateRandomString() . '.' . $request->file('image')->getClientOriginalExtension(),
                'public'
            );
        }

        $article->update(array_merge(
            $request->validated(),
            ['image' => $fileName ?? $article->image]
        ));

        $article->tags()->sync(ArticleService::getNewTagIds($request->tags));

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::delete('public/uploads/' . $article->image);
        }

        $article->tags()->detach();
        $article->delete();

        return redirect()->route('articles.index');
    }
}
