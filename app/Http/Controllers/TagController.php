<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);

        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function store(StoreTagRequest $request)
    {
        Tag::create($request->validated());

        return to_route('tags.index');
    }

    public function update(Tag $tag, StoreTagRequest $request)
    {
        $tag->update($request->validated());

        return to_route('tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return to_route('tags.index');
    }
}
