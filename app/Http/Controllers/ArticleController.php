<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
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
            'body' => $request->title,
            'image' => ! $request->hasFile('image') ?: Storage::put('/', $request->image),
        ]);

        $request->user()->articles()->save($article);

        return redirect()->back();
    }

    public function edit(Request $request, Article $article)
    {
        $request->validate([
            'title' => ['nullable'],
        ]);

        $article->update([
            'title' => $request->title ?? $article->title,
            'body' => $request->body ?? $article->body,
            'image' => ! $request->hasFile('image') ?: Storage::put('/', $request->image),
            'category_id' => $request->category ?? $article->category_id,
        ]);

        $tags = collect();

        if ($request->has('tags')) {
            foreach ($request->tags as $tag) {
                $tags->push(Tag::find($tag));
            }
            $article->tags()->saveMany($tags);
        }

        return redirect()->back();
    }
}
