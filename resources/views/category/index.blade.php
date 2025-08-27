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

                <h1>Categories</h1>
                <a href="{{route('category.create')}}" class="btn btn-primary">Create</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$category->name}}</td>
                                <td>{{$category->created_at? $category->created_at->format('d M Y - H:i:s') : "Not Defined"}}</td>
                                <td>
                                    <a href="{{route('category.edit', $category->id)}}">Edit</a>
                                    <a href="{{route('category.show', $category->id)}}">View</a>
                                    <a href="{{ route('category.destroy', $category->id) }}" onclick="event.preventDefault(); document.getElementById('category-delete').action = '{{ route('category.destroy', $category->id) }}'; document.getElementById('category-delete').submit()">Delete</a>
                                    
                                    <form method="POST" id="category-delete" action="" class="d-none">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-link">Delete</button>
                                    </form>
                                </td>
                            </tr>  
                        @empty
                            <tr>No data found</tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex my-3 justify-content-center">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection