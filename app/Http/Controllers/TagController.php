<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.tags.tags-create', ['tags' => Tag::orderBy('created_at', 'desc')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tag' => 'required|string|max:255',
        ]);

        $tag = new Tag();
        $tag->name = $request->tag;
        try {
            $tag->save();
            return back();
        } catch (\Throwable $th) {
            if ($th->getCode() == '23000') {
                return back()->withErrors(['tag' => 'The tag already exist.']);
            }
            return back()->withErrors(['tag' => 'Some error occur while try store the tag name.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag, $id)
    {
        $tag = Tag::find($id);
        return view('pages.tags', ['tag' => $tag, 'articles' => $tag->articles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag, $id)
    {
        $tag = Tag::find($id);

        if (!$tag) {
            throw new NotFoundHttpException();
        }

        $tag->delete();
        return redirect(route('tag.create'));
    }
}
