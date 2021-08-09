@extends('partials.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Category Create</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Name</label>
                            <input type="text" class="form-control"
                            name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
@endsection
