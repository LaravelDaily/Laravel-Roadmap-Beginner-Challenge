@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Edit Article</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('articles.update', $article) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="title">Article Title</label>
                        <input type="text" class="form-control @error('title') border-danger @enderror" name="title" id="title" value="{{ old('title', $article->title) }}" required>
                        @error('title') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <label for="text">Article Text</label>
                        <textarea class="form-control @error('text') border-danger @enderror" name="text" id="text" cols="30" rows="10">{{ old('text', $article->text) }}</textarea>
                        @error('text') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Article Image</label>
                        <input type="file" class="form-control @error('image') border-danger @enderror" name="image" id="image" value="{{ old('image', $article->image) }}">
                        @error('image') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Article Category</label>
                        <select class="form-control @error('category_id') border-danger @enderror" name="category_id" id="category_id">
                            <option value="">No category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $article->category->name ?? '' === $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <label for="tags[]">Article Tags</label>
                        <select class="custom-select @error('tags') border-danger @enderror" size="5" multiple name="tags[]">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" {{ in_array($tag->name, $article->tags->pluck('name')->toArray()) ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
