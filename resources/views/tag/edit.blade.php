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

                <h3>Edit Tag <a href="{{ route('tag.index') }}" class="btn mx-2 btn-dark">Back</a></h3>
                <form action="{{route('tag.update', $tag->id)}}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{old('name')? old('name') : $tag->name}}" placeholder="Tag Name">
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
