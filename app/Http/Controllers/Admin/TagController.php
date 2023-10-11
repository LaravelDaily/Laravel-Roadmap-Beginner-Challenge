<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\Admin\TagRequest;

class TagController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $tags = Tag::select('id','name')->withCount('articles')->paginate(env('TAGS_PER_PAGE',6));
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request) {
        Tag::create($request->validated());
        return redirect()->route('admin.tags.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag) {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag) {
        $tag->update($request->validated());
        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag) {
        $tag->delete();
        return redirect()->route('admin.tags.index');
    }
}