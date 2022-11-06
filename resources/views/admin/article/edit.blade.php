@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white" style="background-color: #575A57;">{{ 'Update article: ' . $article->title }}</div>

                @include('layouts.validation_error')

                <div class="card-body">
                    <form method="POST" action="{{ route('article.update', $article) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" name="title" value="{{ $article->title }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="excerpt" class="col-md-4 col-form-label text-md-end">Excerpt</label>

                            <div class="col-md-6">
                                <textarea name="excerpt" id="excerpt" cols="40" rows="2">{{ $article->excerpt }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="body" class="col-md-4 col-form-label text-md-end">Body</label>

                            <div class="col-md-6">
                                <textarea name="body" id="body" cols="40" rows="5">{{ $article->body }}</textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center ms-3 pe-2 mb-3">
                            <div class="col-md-4">
                                <select class="form-select"  aria-label="Default select example" name="category">
                                    <option value="{{ $article->category->name }}" selected>{{ $article->category->name  }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-center mb-3 me-5 pe-3">
                            <div class="p-2">
                                <label for="image_path" class="form-label">Article Image</label>
                            </div>
                            <div class="p-2">
                                <input class="form-control" type="file" id="formFile" name="image_path">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-primary" style="background-color: #575A57;">
                                    UPDATE
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection