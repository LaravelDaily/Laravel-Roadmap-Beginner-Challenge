@extends('layouts.app')
@section('title', 'Edit Article')
@section('content')
    <div class="container">


        <x-card title="Edit Article">
            <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" value="{{ old('title') ?? $article->title }}" class="form-control"
                        id="title">
                    @error('title')
                        <div style="color: red" class="form-text">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="full_text" class="form-label">Full Text</label>
                    <textarea class="form-control"name="full_text" id="full_text">{{ old('full_text') ?? $article->full_text }}</textarea>
                    @error('full_text')
                        <div style="color: red" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select form-select-sm" name="category">
                        <option value="" selected>Select Category</option>
                        @foreach ($categories as $category)
                            <option @if ($article->category_id == $category->id) selected @endif value="{{ $category->id }}">
                                {{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label" for="tags">Tags</label>
                    <select id="tags" class="select2-multiple form-select form-selec-sm" name="tags[]"
                        multiple="multiple">
                        @foreach ($tags as $tag)
                            <option @if ($article->hasTag($tag)) selected @endif value="{{ $tag->id }}">
                                {{ $tag->name }}</option>
                        @endforeach

                    </select>

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </x-card>
    </div>
@endsection
