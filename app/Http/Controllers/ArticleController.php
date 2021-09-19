<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'image' => ['nullable', 'image'],
        ]);

        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->hasFile('image') ? Storage::put('/', $request->image) : null,
        ]);

        $request->user()->articles()->save($article);

        return redirect()->back();
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $request->has('image') ?
            $article->update(array_merge(
                $request->validated(),
                ['image' => Storage::put('/', $request->image)]
            )) :
            $article->update($request->validated());

        if ($request->has('tags')) {
            $article->tags()->attach($request->tags);
        }

        return redirect()->back();
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back();
    }
}
