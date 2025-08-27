<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        // dd($request->all());
        $tag = new Tag();

        $tag->create($request->only('name'));

        return redirect()->back()->with('success', __("Tag Created Successfully!"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag.details', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, string $id)
    {
        // dd($request->all());
        $tag = Tag::findOrFail($id);
        $tag->update($request->only('name'));

        return redirect()->route('tag.index')->with('success', __("Tag Updated Successfully!"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tag::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Tag deleted successfully!');
    }
}
