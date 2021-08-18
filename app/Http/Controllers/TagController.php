<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::paginate(10);
        return view('panel.tag.index', compact('tags'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Tag $tag)
    {
        //
    }


    public function edit(Tag $tag)
    {
        //
    }


    public function update(Request $request, Tag $tag)
    {
        //
    }


    public function destroy(Tag $tag)
    {
        //
    }
}
