@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Tag <a href="{{ route('tags.index') }}" class="btn btn-outline-success btn-sm">Back</a></h1>
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
                        <h3 class="card-title">Edit tag</h3>
                    </div>
                    <form method="post" action="{{ route('tags.update', $tag->id) }}">
                        @csrf @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title <small>*</small></label>
                                <input name="title" type="text" class="form-control" id="title" placeholder="Enter Title" value="{{ old('title', $tag->title) }}">
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
