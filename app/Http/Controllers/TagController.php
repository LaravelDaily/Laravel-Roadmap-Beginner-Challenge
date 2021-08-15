<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('tags.index', ['tags' => Tag::paginate(16)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $request
     * @return RedirectResponse
     */
    public function store(TagRequest $request): RedirectResponse
    {
        Tag::create($request->all());
        return redirect()->route('tag.index')->with(['message' => 'Successfully created']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        return view('tags.edit', ['tag' => Tag::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TagRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(TagRequest $request, int $id)
    {
        Tag::findOrFail($id)->update([$request->all()]);
        return redirect()->route('tag.index')->with(['message' => 'Successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        Tag::findOrFail($id)->delete();
        return redirect()->route('tag.index')->with(['message' => 'Successfully deleted']);
    }
}
