@extends('layout.layout')

@section('content')
    @include('layout.navbar')
    <main class="container">
        <form action="{{ route('auth.login') }}" method="POST" class="border rounded col-8 mx-auto mt-5 p-4">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address:</label>
                <input type="email" class="form-control" placeholder="admin@admin.com" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </main>
@endsection
