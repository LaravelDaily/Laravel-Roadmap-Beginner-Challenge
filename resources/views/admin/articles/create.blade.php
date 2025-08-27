@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>New Article <a href="{{ route('articles.index') }}" class="btn btn-outline-success btn-sm">Back</a></h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">New Article</h3>
                    </div>
                    <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title <small>*</small></label>
                                <input name="title" type="text" class="form-control" id="title" placeholder="Enter Title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="fulltext">Full Text <small>*</small></label>
                                <textarea name="fulltext" id="fulltext"   class="form-control"  cols="30" rows="10">{{ old('fulltext') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="title">Category<small>*</small></label>
                                 <select name="category_id">
                                    <option>Select Category</option>

                                    @forelse ($categories as $category)
                                        <option {{ ($category->id == old('category_id')) ? 'selected' : null }} value="{{ $category->id }}">
                                            {{ $category->title }}
                                        </option>
                                    @empty
                                    @endforelse
                                 </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Tags</label> <br>
                                @foreach ($tags as $tag)
                                <input name="tags[]" type="checkbox" id="{{ $tag->title }}" value="{{ $tag->id }}">  <label style="font-weight: normal" for="{{ $tag->title }}">{{ $tag->title }}</label>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="">Article Image (optional)</label><br>
                                <input type="file" name="image" id="image">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
