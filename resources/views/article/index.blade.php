@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Articles') }}</div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                    <ol>
                        @forelse ($articles as $article)
                            <li>
                                <a href="{{route('article.show', $article->id)}}">{{ucfirst($article->title)}}</a>
                            </li>
                        @empty
                            <li>No data found</li>
                        @endforelse
                    </ol>
                    <div class="mb-3">
                        {{$articles->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection