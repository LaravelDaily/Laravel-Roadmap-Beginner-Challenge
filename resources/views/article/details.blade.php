@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Article Page') }} <a href="{{ url()->previous() }}" class="btn btn-sm btn-dark mx-2">Back</a></div>

                <div class="card-body">
                    <h1 class="text-decoration-underline">{{ucfirst($article->title)}}</h1>
                    <p class="mb-0"><b>Description: </b>{{$article->details}}</p>
                    <p class="mb-0"><b>Images: </b></p>
                    <img src="{{ asset('storage/images/'.$article->image) }}" alt="Article Image" height="250px;" width="350px;" class="mb-3">
                    <p class="mb-0"><b>Category:</b> {{$article->category? $article->category->name: 'Not defined'}}</p>
                    <p>
                        <b>Tags:</b> @forelse($article->tags as $tag) {{$tag->name}}, @empty No tags found @endforelse
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection