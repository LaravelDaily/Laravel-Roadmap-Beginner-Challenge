<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(20);   
        return view('pages.tag.index', compact('tags'));
    }

    public function edit(Tag $tag)
    {
        $tag = Tag::find($tag->id);
        return view('pages.tag.edit', compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:tags,name'
        ]);
        Tag::create($validated);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'name' => 'required|'.Rule::unique('tags')->ignore($tag->id)
        ]);
        $tag->update($validated);
        return redirect(route('admin.tag.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        Tag::find($tag->id)->delete();
        return redirect()->back();
    }
}
