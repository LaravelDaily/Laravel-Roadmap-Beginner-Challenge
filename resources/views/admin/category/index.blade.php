@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>List of all categories</h2>
                    <div>
                        <a class="btn btn-success" href="{{ route('categories.create') }}">New</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('admin.includes.alerts')
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="150px">
                                <a class="btn btn-warning" href="{{ route('categories.edit', $category) }}">Edit</a>
                                <form class="d-inline-block" action="{{ route('categories.destroy', $category) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <p>No categories to display</p>
                    @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
