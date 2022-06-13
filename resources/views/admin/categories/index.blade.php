@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ route('categories.create') }}"> Add new Category</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (session('errors'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->all() as $message)
                                            <p>{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @endif
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td><a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">
                                                Edit</a>
                                            <form action="{{ route('categories.destroy', $category) }}" method="post">
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
