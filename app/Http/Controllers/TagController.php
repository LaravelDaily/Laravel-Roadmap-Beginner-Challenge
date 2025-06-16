<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view("tag.index", compact("tags"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $validated = $request->validated();

        Tag::create($validated);
        session()->flash("success","Successfully created a new tag.");
        return redirect()->route("admin.tag.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, string $id)
    {
        $validated = $request->validated();
        $oldTag = Tag::findOrFail($id);
        $oldTag->update($validated);
        session()->flash("success","Successfully updated the " . $oldTag->name . " tag");
        return redirect()->route("admin.tag.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tagToBeDeleted = Tag::findOrFail($id);
        Tag::destroy($id);
        session()->flash("success","Successfully deleted the " . $tagToBeDeleted->name . " tag");
        return redirect()->route("admin.tag.index");
    }
}
