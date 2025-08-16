<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\ArticleTag;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    private $adminRoute;

    public function __construct()
    {
        $this->adminRoute = Article::$adminRoute;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('category')->latest()->paginate(15);
        return view("$this->adminRoute.index", compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("$this->adminRoute.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->safe();
        try {
            $article = Article::create($validated->except('tag_id', 'image'));
            $article_tag_ids = $validated->only('tag_id');
            foreach ($article_tag_ids as $article_tag_id) {
                $article->tags()->attach($article_tag_id);
            }
            if($request->hasFile('image')){
                $name = $request->file('image')->getClientOriginalName();
                $path = Storage::putFileAs('public/articles', $request->file('image'), $article->id.'/'.$name);
                $article->update([
                    'image_path' => $path
                ]);
            }
            $message_type = 'success';
            $message = __('added successfully');
        } catch (\Exception $exception) {
            $code = $exception->getCode();
            $message = $exception->getMessage();
            return view('errors.custom-error', compact('message', 'code'));
        }
        return to_route("$this->adminRoute.index")->with($message_type, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view("$this->adminRoute.show", compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $old_tags = $article->tags()->pluck('tags.id');
        return view("$this->adminRoute.edit", compact('article', 'old_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateArticleRequest $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validated = $request->validated();
        try {
            $article->update($validated);
            if($request->hasFile('image')){
                $name = $request->file('image')->getClientOriginalName();
                $path = Storage::putFileAs('public/articles', $request->file('image'), $article->id.'/'.$name);

                Storage::delete($article->image_path);
                $article->update([
                    'image_path' => $path
                ]);
            }
            $message_type = 'success';
            $message = __('updated successfully');
        } catch (\Exception $exception) {
            $code = $exception->getCode();
            $message = $exception->getMessage();
            return view('errors.custom-error', compact('message', 'code'));
        }
        return to_route("$this->adminRoute.index")->with($message_type, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        try {
            $article->tags()->detach();
            Article::destroy($article->id);
            $message_type = 'success';
            $message = __('deleted successfully');
        } catch (\Exception $exception) {
            $code = $exception->getCode();
            $message = $exception->getMessage();
            return view('errors.custom-error', compact('message', 'code'));
        }
        return to_route("$this->adminRoute.index")->with($message_type, $message);
    }
}
