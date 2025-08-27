@extends('layout.layout')

@section('title')
    Categories
@endsection

@section('content')
    <main class="container mt-5 px-5">
        <section class="container border rounded px-0">
            <h4 class="border-bottom px-4 py-2 bg-secondary bg-opacity-10">Add Category</h4>
            <form action="{{ route('categories.store') }}" method="POST" class="container py-3">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-secondary">Submit</button>
            </form>
        </section>
    </main>
@endsection
