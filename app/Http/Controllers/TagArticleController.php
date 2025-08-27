<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagArticleController extends Controller
{
    public function index(Tag $tag)
    {
        return view('tagsArticles.index')
            ->with('tag', $tag = Tag::where('id', $tag->id)->with('articles', 'articles.category')->first())
            ->with('articles', $tag->articles);
    }
}
