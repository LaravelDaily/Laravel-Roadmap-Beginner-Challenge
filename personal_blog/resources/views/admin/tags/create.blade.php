@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('tags') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.tags.store')}}">
                            @csrf
                            <x-forms.input :name="'title'" :old_record="''"></x-forms.input>
                            <x-forms.submit></x-forms.submit>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
