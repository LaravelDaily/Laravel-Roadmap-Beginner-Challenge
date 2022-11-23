<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Services\ModelCRUDService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    private $crud;

    public function __construct(ModelCRUDService $crud)
    {
        $this->crud = $crud;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = auth()->user()->articles()->latest()->paginate(12);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create', [
            'article' => new Article(),
            'categories' => Category::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $data = Arr::collapse([
            Arr::except($request->validated(), 'tags'),
            [
                'slug' => str($request->title . now()->timestamp)->slug(),
                'user_id' => auth()->id(),
                'image' => $request->file('image')->store('articles')
            ]
        ]);
        $article = $this->crud->create(new Article(), $data);
        $article->tags()->sync($request->tags);
        return redirect()->route('articles.index')->with('status', 'Article Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article,
            'categories' => Category::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        // filter data
        $data = Arr::collapse([
            Arr::except($request->validated(), 'tags', 'image'),
            [
                'slug' => str($request->title . now()->timestamp)->slug(),
                'user_id' => auth()->id(),
            ]
        ]);
        if ($request->image) {
            Storage::delete($article->image);
            $data = Arr::collapse([
                $data,
                ['image' => $request->file('image')->store('articles')]
            ]);
        }
        //insert data
        $this->crud->update($article, $data);
        $article->tags()->sync($request->tags);
        return redirect()->route('articles.show', $article->slug)->with('status', 'Article Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->crud->delete($article);
        return redirect()->route('articles.index')->with('status', 'Article Deleted');
    }
}
