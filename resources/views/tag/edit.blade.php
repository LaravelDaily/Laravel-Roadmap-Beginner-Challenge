@extends('layout.layout')

@section('title')
    Tags
@endsection

@section('content')
    <main class="container mt-5 px-5">
        <section class="container border rounded px-0">
            <h4 class="border-bottom px-4 py-2 bg-secondary bg-opacity-10">Edit Tag</h4>
            <form action="{{ route('tag.update', ['tag' => $tag->id]) }}" method="POST" class="container py-3">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" name="name"
                        value="{{ $tag->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-secondary">Submit</button>
            </form>
        </section>
    </main>
@endsection
