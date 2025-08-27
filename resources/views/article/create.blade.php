@extends('partials.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Articles Create</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Title</label>
                            <input type="text" class="form-control"
                            name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="sel1">Category</label>
                            <select class="form-control" id="sel1" name="category">
                                <option value="{{ null }}">Choose One</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == old('category') ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="sel1">Tags</label>
                            <select class="js-example-basic-multiple"
                            name="tags[]" multiple="multiple" style="width:100%">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ in_array($tag->id, old('tags') ??[]) ? 'selected' : '' }}>
                                        {{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file border" name="image">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Content">Content</label>
                            <textarea class="form-control"
                            name="content" rows="5" id="content"> {{ old('content') }}</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
@endsection
