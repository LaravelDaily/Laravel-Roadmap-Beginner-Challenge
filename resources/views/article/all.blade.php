@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row flex-nowrap">
           @include('includes.sidebar')
            <div class="col py-3">
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <h1>Articles</h1>
                <a href="{{route('article.create')}}" class="btn btn-primary">Create</a>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ucfirst($article->title)}}</td>
                                <td>{{$article->category? $article->category->name : 'Not Defined'}}</td>
                                <td>
                                    <a href="{{route('article.edit', $article->id)}}">Edit</a>
                                    <a href="{{route('article.show', $article->id)}}">View</a>
                                    <a href="{{ route('article.destroy', $article->id) }}" onclick="event.preventDefault(); document.getElementById('article-delete').action = '{{ route('article.destroy', $article->id) }}'; document.getElementById('article-delete').submit();">Delete</a>
                                    
                                    <form method="POST" id="article-delete" action="" class="d-none">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>  
                        @empty
                            <tr>No data found</tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex my-3 justify-content-center">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
