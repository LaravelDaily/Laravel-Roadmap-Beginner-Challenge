<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class TagController extends Controller
{
    
    public function index(): View
    {
    
        return view('admin.tag.index', [
            'tags' => Tag::latest()->paginate(10),
        ]);
    }
    public function show(Tag $tag): View 
    {
        return view('admin.tag.show', [
            'tag' => $tag
        ]);
    }
    public function edit(Tag $tag): View
    {
    
        return view('admin.tag.edit', [
            'tag' => $tag,
        ]);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
        return redirect(route('tag.show', $tag))->with(['status' => 'Tag updated!']);
    }

    public function store(Request $request)
    {
        Tag::create($request->all());
        return redirect(route('tag.index', [
            'tags' => Tag::latest()->paginate(10),
        ]))->with(['status' => 'Tag added!']);
    }
}
