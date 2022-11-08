@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-3">
    <table class="table table-striped custab">
        <thead>
            <tr>
                <th>#</th>
                <th>Article</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        @forelse ($articles as $article)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ route('article.show', $article) }}">{{ $article->title }}</a></td>
                <td class="text-center">
                    <div class="d-grid gap-1 d-md-flex justify-content-center">
                        <a class='btn btn-success btn-sm rounded-3 mt-1' href="{{ route('article.edit', $article) }}"> Edit</a>
                        <form action="{{ route('article.destroy', $article) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-2">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <h4>There are no articles. Create a new one.</h4>
        @endforelse
    </table>
    <a href="{{ route('article.create') }}" class="btn btn-success btn-sm rounded-3">
        CREATE ARTICLE
    </a>
</div>
@endsection