@extends('layaouts.master')
@section('titre','list des categories')
@section('content')
<div class="container my-5">
    <h1>List des categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-success float-end">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Created_at</th>
            <th scope="col" colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($categories  as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{$category->name}}</td>
                    <td>
                        {{ $category->created_at }}
                    </td>
                    <td>
                        <a href="{{ route('categories.edit',$category) }}" class="btn btn-primary">Update</a>
                    </td>
                    <td>
                        <a href="{{ route('categories.show',$category) }}" class="btn btn-info">Show</a>
                    </td>
                    <td>
                        <form action="{{ route('categories.destroy',$category) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach

    </tbody>
    </table>
    </div>
@endsection
