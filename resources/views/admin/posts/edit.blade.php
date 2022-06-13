@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Edit Post</div>
                    <div class="m-1">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            Title: <br>
                            <input type="text" class="form-control" name="title" value="{{ $post->title }}" />
                            <br>
                            Description: <br>
                            <input type="textarea" class="form-control" name="description"
                                value="{{ $post->description }}" />
                            <br>
                            Category: <br>
                            <select class="form-select" value="{{ $post->category->id }}" name="category_id"
                                label="example">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <br>
                            Tags: <br>
                            <input type="text" class="form-control" name="tags" value="{{ old('tags', $tags) }}" />
                            <br>
                            Image: <br>
                            <input type="file" class="form-control" name="image" value="{{ $post->image }}" />
                            <br>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
