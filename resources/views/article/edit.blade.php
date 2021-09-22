@extends('layout.layout')

@section('title')
    Article
@endsection

@section('content')
    <main class="container mt-5 px-5">
        <section class="container border rounded px-0">
            <h4 class="border-bottom px-4 py-2 bg-secondary bg-opacity-10">Edit Article</h4>
            <form action="{{ route('article.update', ['article' => $article->id]) }}" method="POST" class="container py-3"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}" name="title"
                        value="{{ $article->title ?? old('title') }}">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select {{ $errors->has('category_id') ? 'border-danger' : '' }}"
                        aria-label="Default select example" name="category_id">
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $article->category_id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @empty
                            <option selected>No available categories</option>
                        @endforelse
                    </select>
                    @error('category_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Image(Optional)</label>
                    <input class="form-control {{ $errors->has('image') ? 'border-danger' : '' }}" type="file"
                        id="formFile" name="image">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Tags(Separated by comma)</label>
                    <input type="text" class="form-control {{ $errors->has('tags') ? 'border-danger' : '' }}" name="tags"
                        value="{{ $tags ?? old('tags') }}">
                    @error('tags')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control {{ $errors->has('body') ? 'border-danger' : '' }}"
                        placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"
                        name="body">{{ $article->body ?? old('body') }}</textarea>
                    <label for="floatingTextarea2">Body</label>
                    @error('body')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-secondary">Submit</button>
            </form>
        </section>
    </main>
@endsection
