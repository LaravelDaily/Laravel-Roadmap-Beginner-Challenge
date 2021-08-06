<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function index()
    {
        return view('pages.tag.index', [
            'tags' => Tag::withCount('posts')->latest()->paginate(10)
        ]);
    }

    public function show(Tag $tag)
    {
        // No need to show bcz of having only 1 column.
        return redirect()->route('tag.index');
    }

    public function create()
    {
        return view('pages.tag.create');
    }

    public function store(TagRequest $request)
    {
        Tag::create($request->validated());
        return redirect()->route('tag.index')->with(['success' => 'Create success']);
    }

    public function edit(Tag $tag)
    {
        return view('pages.tag.edit', ['tag' => $tag]);
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return redirect()->route('tag.index')->with(['success' => 'Edit success']);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index')->with(['success' => 'Delete success']);
    }
}
