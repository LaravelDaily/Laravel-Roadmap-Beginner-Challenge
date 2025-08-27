@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('includes.sidebar')
            <div class="col py-3">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <p><strong>Opps Something went wrong</strong></p>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <h3>Create Article <a href="{{ route('article.index') }}" class="btn mx-2 btn-dark">Back</a></h3>
                <form action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}" placeholder="Article Title">
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Details</label>
                        <textarea class="form-control" name="details" id="details" rows="3">{{old('details')}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Select a Category</label>
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option value="" selected>Select a category</option>
                            @forelse ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="select" class="form-label">Tags</label>
                        <select class="tag-select form-control" name="tags[]" multiple="multiple" id="select">
                            @forelse ($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image Upload</label>
                        <input class="form-control" type="file" name="image" id="formFile" value="{{old('image')}}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
<script>
    $(document).ready(function () {
        $('tag-select').select2();
    });
</script>
