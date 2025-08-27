@extends('layouts.app')

@section('content')
    <h1 class="display-5 mb-5">Create</h1>
    <form action="{{ route('posts.store') }}" method="POST" style="margin: 0 10rem" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="text" name="title" class="mb-3 form-control" placeholder="Title" />
        @if ($errors->has('title'))
            <p class="text-danger">{{ $errors->first('title') }}</p>
        @endif
        <textarea placeholder="Full Text" name="fullText" cols="30" rows="10" class="mb-3 form-control"></textarea>
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
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary col-12">Post Me</button>
    </form>
@endsection
