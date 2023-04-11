@extends('layouts.app')

@section('content')
    <h1 class="display-5 mb-5">Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" style="margin: 0 10rem" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="text" name="title" class="mb-3 form-control" placeholder="Title" value="{{ $post->title }}" />
        @if ($errors->has('title'))
            <p class="text-danger">{{ $errors->first('title') }}</p>
        @endif
        <textarea placeholder="Full Text" name="fullText" cols="30" rows="10" class="mb-3 form-control"
            value="{{ $post->fullText }}"></textarea>
        @if ($errors->has('fullText'))
            <p class="text-danger">{{ $errors->first('fullText') }}</p>
        @endif
        <input type="file" name="image" class="form-control mb-3">
        @if ($errors->has('image'))
            <p class="text-danger">{{ $errors->first('image') }}</p>
        @endif
        <select name="category_id" class="form-select mb-3">
            @if ($categories)
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            @else
                <option value="0"> No Category Found </option>
            @endif
        </select>
        <div class="my-4">
            <p class="lead">Choose Tags: </p>
            <select name="tags[]" class="form-select" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" @selected($post->tags->contains($tag->id))>{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary col-12">Edit Me</button>
    </form>
    <form action={{ route('posts.destroy', $post->id) }} method="POST" class="m-5 text-end">
        @csrf
        @method('DELETE')
        <p>You don't want this Post Again?</p>
        <button type="submit" class="btn btn-danger">Delete Me</button>
    </form>
@endsection
