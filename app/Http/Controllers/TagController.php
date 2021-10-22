<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TagRequest $request)
    {
        Tag::create($request->validated());
        return redirect()->route('tags.index')->with('status', 'Tag created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Tag $tag)
    {
        // we don't actually need it, we have the index that can display them
        // return view('admin.tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact(['tag']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TagRequest $request
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TagRequest $request, tag $tag)
    {
        $tag->update($request->validated());
        return redirect()->route('tags.index')->with('status', 'Tag updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tag $tag)
    {
        $tag->articles()->detach($tag->id);
        $tag->delete();
        return redirect()->route('tags.index')->with('status', 'Tag deleted successfully!');
    }
}
