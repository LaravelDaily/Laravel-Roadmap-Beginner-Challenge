@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New Article</div>
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="category">Category</label>
                            <select name="category" class="select form-control" id="category" value="{{ old('category')}}">
                                @if(count($categories) > 0)
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}<option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tag">Tags</label>
                            <select name="tag[]" class="select form-control" id="tag" value="{{ old('tag') }}" multiple>
                                @if(count($tags) > 0)
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}<option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="full_text">Text</label>
                        <textarea class="form-control" name="full_text"  rows="10" value="{{ old('full_text') }}"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="image">File</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
