@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create new Category</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categories.store') }}">
                            @csrf
                            name: <br>
                            <input type="text" class="form-control" name="name" value=""/>
                            <br>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
