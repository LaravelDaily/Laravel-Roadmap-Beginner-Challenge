@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('includes.sidebar')
            <div class="col py-3">
                <h3>Edit Article <a href="{{ route('article.index') }}" class="btn mx-2 btn-dark">Back</a></h3>
                <form action="{{route('article.update', $article->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" value="{{$article->title}}" class="form-control" id="title" placeholder="Article Title">
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Details</label>
                        <textarea class="form-control" name="details" id="details" rows="3">{{$article->details}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Select Category</label>
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option value="" selected >Select a category</option>
                            @forelse ($categories as $category)
                                <option value="{{$category->id}}" @selected($article->category->id == $category->id)>{{$category->name}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="select" class="form-label">Tags</label>
                        <select class="tag-select form-control" name="tags[]" multiple="multiple" id="select">
                            @forelse ($tags as $tag)
                                <option value="{{$tag->id}}" @selected($article->tags->contains($tag->id)) >{{$tag->name}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image Upload</label>
                        <input class="form-control mb-3" type="file" name="image" id="formFile">
                        Current Image: <img src="{{ asset('storage/images/'.$article->image) }}" alt="Article Image" height="70px;" width="130px;">
                        
                        <p class="text-warning">If you don't want to update your image then leave it blank.</p>
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