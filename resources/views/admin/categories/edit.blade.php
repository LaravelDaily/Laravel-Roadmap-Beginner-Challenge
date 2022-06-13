@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Category Edit</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categories.update', $category) }}">
                            @method('PUT')
                            @csrf
                            name: <br>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}"/>
                            <br>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
