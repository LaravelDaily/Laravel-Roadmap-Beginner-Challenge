@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="d-inline">Add Post</h2>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="form-post" action="{{ route('admin.posts.update', $post)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-outline mb-4">
                            <label class="form-label" for="category">Category</label>
                            <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category" id="category">
                                <option value="0">select category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($category->id == $post->category->id ) selected @endif>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select> 
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="tags">Tags</label>
                            <input type="text" id="tags" name="tags" class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" value="{{ old('tags', $tags) }}"/>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title', $post->title) }}"/>
                        </div>
                        <div class="form-group mb-4">
                            <label for="post">Post</label>
                            <textarea type="text" class="form-control {{ $errors->has('post') ? 'is-invalid' : '' }}" id="post" name="post">{{ old('title', $post->post) }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
