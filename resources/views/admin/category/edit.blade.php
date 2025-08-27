@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Edit Category</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update', $category) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control @error('name') border-danger @enderror" name="name" id="name" value="{{ old('name', $category->name) }}" required>
                        @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
