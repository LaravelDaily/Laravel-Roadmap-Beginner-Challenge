<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreArticleRequest;
use App\Http\Requests\Admin\UpdateArticleRequest;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('tags')->get();
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.article.create', compact('categories'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->safe()->merge([
            'user_id' => auth()->id()
        ]);

        $category = Category::where('name', $validated->category)->first();
        $article = Article::create($validated->toArray());
        $article->category()->associate($category);

        if ($request->filled('tag')) {
            $tags = explode(',', $request->tag);

            foreach ($tags as $tag) {
                $article->tags()->create([
                    'name' => $tag
                ]);
            }
        }

        if ($request->hasFile('image_path')) {
            $article->update([
                'image_path' => $this->storeImage($request)
            ]);
        }

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('admin.article.edit', compact(['article', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateArticleRequest  $request
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {

        $validated = $request->validated();
        $category = Category::where('name', $request->category)->first();
        $article->update($validated);

        if ($request->hasFile('image_path')) {
            $this->updateArticleImage($request, $article);
        }

        return redirect()->route('article.index', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if ($this->imageExists($article->image_path)) {
            Storage::disk('public')->delete('images/'.$article->image_path);
        }
        $article->delete();

        return redirect()->route('article.index');
    }

    /**
     * It stores the image to the public storage.
     *
     * @param StoreArticleRequest|UpdateArticleRequest $request
     * @return string The filename that was stored.
     */
    private function storeImage(StoreArticleRequest|UpdateArticleRequest $request)
    {   
        $path = explode("/", $request->file('image_path')->store('public/images'));
        $imageName = end($path);

        return $imageName;
    }

    /**
     * Update article image and remove old image from storage.
     *
     * @param UpdateArticleRequest $request
     * @param Article $article
     * @return void
     */
    private function updateArticleImage(UpdateArticleRequest $request, Article $article)
    {
        if ($this->imageExists($article->image_path)) {
            Storage::disk('public')->delete('images/'.$article->image_path);
        }

        $article->update([
            'image_path' => $this->storeImage($request)
        ]);
    }

    /**
     * Check if image exists in public storage
     *
     * @param string $imagePath
     * @return bool
     */
    private function imageExists($imagePath)
    {
        return Storage::disk('public')->exists('images/'.$imagePath);
    }
}
