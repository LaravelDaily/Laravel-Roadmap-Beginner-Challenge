<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function create()
    {
        return view('articles.create', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(ArticleRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('image')) {
            $path = $request->file('image')->store('images');
            $validated['image'] = $path;
        }

        $article = auth()->user()->articles()->create($validated);

        return redirect(route('articles.show', $article));
    }

    public function show(Article $article)
    {
        $article->load('category', 'tags');

        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article,
            'categories' => Category::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $data = [
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id ?? null,
        ];

        // This should probably go into a separate class (Action/Service) ... but hey :)
        if ($request->boolean('delete_image') || $request->file('image')) {
            Storage::delete($article->image);
            $data['image'] = null;
        }

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('images');
        }

        $article->update($data);

        if (collect($request->tag_ids)->first() !== null) {
            $article->tags()->sync($request['tag_ids']);
        }

        return redirect(route('articles.show', $article));
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

        return redirect(route('dashboard'));
    }
}
