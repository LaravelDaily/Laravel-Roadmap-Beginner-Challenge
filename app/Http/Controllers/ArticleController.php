<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\StoreArticleRequest;
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
        $articles = Article::with('category')->latest()->paginate(15);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $article = new Article;
        if($request->hasFile('image')) {
            $imageName = $this->uploadImage($request->image);
        }
        $article->title = $request->title;
        $article->full_text = $request->full_text;
        $article->category_id = $request->category;
        $article->image = $imageName ?? '';
        $article->save();

        $article->tag()->sync($request->input('tag'));
        return redirect()->route('articles.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('articles.edit', compact(['article','categories','tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        if($request->hasFile('image')) {
           
            if($this->imageExists($article->image)) {
                $this->deleteImage($article->image);
            }

            $imageName = $this->uploadImage($request->image);
            $article->image = $imageName;
        }

        $article->title = $request->title;
        $article->full_text = $request->full_text;
        $article->category_id = $request->category;
        $article->save();
        $article->tag()->sync($request->input('tag'));
        $message = "Article updated successfully";
        return redirect()->route('articles.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        
        if($this->imageExists($article->image)) {
            $this->deleteImage($article->image);
        }

        $article->delete();
        $message = "Article deleted successfully";
        return redirect()->route('articles.index')->with('message', $message);
    }

    private function uploadImage($image) {
        $imageName = time().'_'.$image->getClientOriginalName();
        $image->storeAs('uploads', $imageName, 'public');
        return $imageName;
    }

    private function imageExists($image) {
        if(Storage::disk('public')->exists("uploads/$image")) 
            return true;
    }

    private function deleteImage($image) {
        Storage::disk('public')->delete("uploads/$image");
    }
}
