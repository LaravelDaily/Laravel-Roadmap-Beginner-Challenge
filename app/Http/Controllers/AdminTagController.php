<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;

class AdminTagController extends Controller
{

    public function index()
    {
        $tags = Tag::with('posts')->simplePaginate(20);

        return view('admin.tags.index', compact(['tags']));
    }


    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(StoreTagRequest $request)
    {
        Tag::create($request->validated());

        return redirect()->route('tags.index')->with('success', 'Tag has been created.');
    }


    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }


    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }


    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return redirect()->route('tags.index')->with('success', 'Tag has been updated');
    }


    public function destroy(Tag $tag)
    {

        foreach ($tag->posts() as $post) {
            $post->tags()->detach();
        }

        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag has been deleted');
    }
}
