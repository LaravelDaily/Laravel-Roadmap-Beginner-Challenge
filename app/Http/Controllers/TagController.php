<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function index($id)
    {
        $tag = Tag::with('posts')->findOrFail($id);
        return view('tags.index', compact('tag'));
    }
}
