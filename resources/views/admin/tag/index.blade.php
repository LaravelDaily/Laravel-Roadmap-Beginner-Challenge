@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-3">
    <table class="table table-striped custab">
        <thead>
            <tr>
                <th>#</th>
                <th>Tag</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        @forelse ($tags as $tag)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tag->name }}</td>
                <td class="text-center">
                    <div class="d-grid gap-1 d-md-flex justify-content-center">
                        <a class='btn btn-success btn-sm rounded-3 mt-1' href="{{ route('tags.edit', $tag) }}"> Edit</a>
                        <form action="{{ route('tags.destroy', $tag) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-2">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <h4>There are no tags. Create a new one.</h4>
        @endforelse
    </table>
    <a href="{{ route('tags.create') }}" class="btn btn-success btn-sm rounded-3">
        CREATE TAG
    </a>
</div>
@endsection