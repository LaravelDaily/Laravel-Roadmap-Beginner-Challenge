@extends('layouts.app')
@section('title', 'Edit Category')
@section('content')
    <div class="container">
        <x-card title="Edit Category">

            <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') ?? $category->name }}" class="form-control"
                        id="name">
                    @error('name')
                        <div style="color: red" class="form-text">{{ $message }}</div>
                    @enderror

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </x-card>
    </div>

@endsection
