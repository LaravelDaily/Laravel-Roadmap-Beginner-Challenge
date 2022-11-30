<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
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
        return view('dashboard.articles.index', [
            'articles' => auth()->user()
                ->articles()
                ->with(['tags:name', 'categories:name'])
                ->latest()
                ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.articles.create', [
            'tags' => cache()->remember('all-tag', now()->addDay(), function () {
                return Tag::select('name', 'id')->get();
            }),
           'categories' => cache()->remember('all-category', now()->addDay(), function () {
               return Category::select('name', 'id')->get();
           }),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:5'],
            'full_text' => ['required', 'string', 'min:5'],
            'image' => ['required', 'image', 'file', 'max:1024'],
            'tags' => ['nullable'],
            'tags.*' => ['required', 'integer','exists:tags,id'],
            'categories' => ['required'],
            'categories.*' => ['required', 'integer','exists:categories,id'],
        ], [], [
            'tags.*' => 'tag',
            'categories.*' => 'category',
        ]);

        $validated['image'] = $validated['image']->store('articles/', 'public');

        $article = auth()->user()->articles()->create($validated);

        if (isset($validated['tags'])) {
            $article->tags()->attach($validated['tags']);
        }

        $article->categories()->attach($validated['categories']);

        return to_route('dashboard.articles.index')
            ->with('success', 'Created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('dashboard.articles.edit', [
            'tags' => cache()->remember('all-tag', now()->addDay(), function () {
                return Tag::select('name', 'id')->get();
            }),
           'categories' => cache()->remember('all-category', now()->addDay(), function () {
               return Category::select('name', 'id')->get();
           }),
           'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:5'],
            'full_text' => ['required', 'string', 'min:5'],
            'image' => ['nullable', 'image', 'file', 'max:1024'],
            'tags' => ['nullable'],
            'tags.*' => ['required', 'integer','exists:tags,id'],
            'categories' => ['required'],
            'categories.*' => ['required', 'integer','exists:categories,id'],
        ], [], [
            'tags.*' => 'tag',
            'categories.*' => 'category',
        ]);

        if (isset($validated['image'])) {
            $this->deleteImage($article->image);
            $validated['image'] = $validated['image']->store('articles/', 'public');
        }

        $article->update($validated);

        if (isset($validated['tags'])) {
            $article->tags()->sync($validated['tags']);
        } else {
            $article->tags()->sync([]);
        }

        $article->categories()->sync($validated['categories']);

        return to_route('dashboard.articles.index')
            ->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->deleteImage($article->image);

        $article->delete();

        return to_route('dashboard.articles.index')
            ->with('success', 'Deleted successfully');
    }

    private function deleteImage(string $path): bool
    {
        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }

        return true;
    }
}
