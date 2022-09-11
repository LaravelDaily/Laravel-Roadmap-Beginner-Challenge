@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Articles</div>

                <div class="card-body">
                   @if(count($articles) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>title</th><th>category</th><th>date</th>
                                <tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article) 
                                    <tr>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ $article->category->name }}</td>
                                        <td>{{ $article->date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> 
                   @endif
                    <a class="btn btn-success" href="{{ route('articles.index') }}">View All</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">
                   @if(count($categories) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>name</th>
                                <tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category) 
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> 
                        <a class="btn btn-success" href="{{ route('categories.index') }}">View All</a>
                    @else
                    <a class="btn btn-success" href="{{ route('categories.create') }}">Create New Category</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Tags</div>

                <div class="card-body">
                   @if(count($tags) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>name</th>
                                <tr>
                            </thead>
                            <tbody>
                                @foreach($tags as $tag) 
                                    <tr>
                                        <td>{{ $tag->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> 
                        <a class="btn btn-success" href="{{ route('tags.index') }}">View All</a>
                    @else
                    <a class="btn btn-success" href="{{ route('tags.create') }}">Create New Tag</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
