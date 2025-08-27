@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Articles <a href="{{ route('articles.create') }}" class="btn btn-outline-success btn-sm">Add New</a></h1>
            </div>
        </div>

        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    {{-- <th>Full Text</th> --}}
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($articles as $article)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></td>
                                        
                                        <td><img src="{{ $article->getFirstMediaUrl('images') }}" width="100"></td>
                                        <td>
                                            @if ($article->category)
                                                <a href="{{ route('categories.show', $article->category->id)}}">{{ $article->category->title }} </a>
                                            @endif
                                        </td>
                                        <td> @foreach ($article->tags as $tag)
                                            <a href="{{ route('tags.show', $tag->id)}}">{{$tag->title}}</a>@if(!$loop->last),@endif
                                            @endforeach

                                            </td>
                                        <td>{{ $article->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <form method="post" action="{{ route('articles.destroy', $article->id)}}">
                                                @csrf @method('DELETE')
                                                <a href="{{ route('articles.show', $article->id) }}" class="btn  btn-info btn-sm">View</a>
                                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" align="center">
                                            <p class="text-danger">Sorry, we couldn't find any Tag</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
