@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Articles</div>

                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show mt-10" role="alert">
                    <strong>Success!</strong> {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="card-body">
                   @if(count($articles) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>title</th><th>text</th><th>category</th><th>tags</th><th>date</th><th>#</th><th>#</th>
                                <tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article) 
                                    <tr>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ Str::limit($article->full_text, 70) }}</td>
                                        <td>{{ $article->category->name }}</td>
                                        <td>
                                            @foreach($article->tag as $tag)
                                            <span class="badge badge-info">{{ $tag->name}}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $article->date }}</td>
                                        <td><a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                                        <td>
                                            <form action="{{ route('articles.destroy', $article->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">
                                            </form> 
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $articles->links() }}
                            </tbody>
                        </table> 
                   @endif
                    <a class="btn btn-success" href="{{ route('articles.create') }}">Create New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
