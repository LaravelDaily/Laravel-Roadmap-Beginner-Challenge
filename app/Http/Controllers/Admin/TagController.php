<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagStoreRequest;
use App\Http\Requests\Admin\TagUpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $getTagList = Tag::paginate(5);
        return view('admin.tag.index', compact('getTagList'));
    }

    public function store(TagStoreRequest $request)
    {
        Tag::create($request->validated());
        return redirect()->route('admin.tag.index')->with('success_message', 'Tag has been created successfully!');
    }

    public function update(TagUpdateRequest $request, string $id)
    {
        $updateTag = Tag::findOrFail($id);
        $updateTag->update($request->validated());
        if(!$updateTag->wasChanged()) {
            $message = ['info_message' => 'You have not change anything. Nothing to update!'];
        } else {
            $message = ['success_message' => 'The tag was successfully updated.'];
        }
        return redirect()->route('admin.tag.index')->with($message);
    }

    public function destroy(string $id)
    {
        $category = Tag::destroy($id);
        return redirect()->route('admin.tag.index')->with(['success_message' => 'The category was successfully deleted.']);
    }
}
