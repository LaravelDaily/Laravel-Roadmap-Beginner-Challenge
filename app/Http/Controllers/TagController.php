<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::withCount('articles')->latest()->paginate(5);
        return view('backend.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('backend.tags.create');
    }

    public function store(TagRequest $request)
    {
        Tag::create($request->validated());

        return redirect()->route('backend.tags.index')->with('success', 'Tag created successfully!');
    }

    public function edit(Tag $tag)
    {
        return view('backend.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return redirect()->route('backend.tags.index')->with('success', 'Tag updated successfully!');
    }

    public function destroy(Tag $tag)
    {
        if ($tag->articles()->count()) {
            return back()->with('error', 'This tag has articles, you cannot delete this!');
        }

        $tag->delete();

        return redirect()->route('backend.tags.index')->with('success', 'Tag deleted successfully!');
    }
}
