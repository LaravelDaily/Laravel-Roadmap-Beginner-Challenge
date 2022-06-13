@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Tags</div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ route('tags.create') }}"> Add new Tag</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <th scope="row">{{ $tag->id }}</th>
                                        <td>{{ $tag->name }}</td>
                                        <td><a href="{{ route('tags.edit', $tag) }}" class="btn btn-warning"> Edit</a>
                                            <form action="{{ route('tags.destroy', $tag) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
