@extends('layouts.app')

@push('css')
    <style>
        .card-header-with-button {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-with-button">
                        {{ __('Create Article')}}
                        <a href="{{route('backend.articles.index')}}" class="btn btn-success">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('backend.articles.store') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title"
                                       class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                       value="{{ old('title') }}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="excerpt" class="form-control @error('excerpt') is-invalid @enderror"
                                          rows="2" placeholder="Excerpt">{{ old('excerpt') }}</textarea>
                                @error('excerpt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="body" class="form-control @error('body') is-invalid @enderror" rows="5"
                                          placeholder="Body">{{ old('body') }}</textarea>
                                @error('body')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="form-control @error('category_id') is-invalid @enderror"
                                        name="category_id">
                                    <option>Select Category</option>
                                    @forelse($categories as $category)
                                        <option
                                            value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @empty
                                        <option disabled>No category found!</option>
                                    @endforelse
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select multiple class="form-control @error('tag_id') is-invalid @enderror"
                                        name="tag_id[]">
                                    @forelse($tags as $tag)
                                        <option
                                            value="{{ $tag->id }}" {{ in_array($tag->id, old('tag_id', [])) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                    @empty
                                        <option disabled>No tag found!</option>
                                    @endforelse
                                </select>
                                <small class="form-text text-muted">You can select multiple tags.</small>
                                @error('tag_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control-file @error('thumbnail') is-invalid @enderror"
                                       name="thumbnail">
                                <small class="form-text text-muted">Image dimension should be under 700x300.</small>
                                @error('thumbnail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
