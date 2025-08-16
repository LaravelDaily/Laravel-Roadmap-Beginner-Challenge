@extends('layouts.app')

@section('content')
    <x-messages></x-messages>
    <x-forms.button :type="__('add')" :link="route('admin.articles.create')"></x-forms.button>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('articles') }}</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('title')}}</th>
                                <th scope="col">{{__('description')}}</th>
                                <th scope="col">{{__('category')}}</th>
                                <th scope="col">{{__('added on')}}</th>
                                <th scope="col">{{__('actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($articles as $article)
                                <tr>
                                    <th scope="row">{{$article->id}}</th>
                                    <td scope="row">{{$article->title}}</td>
                                    <td scope="row">{{ Str::of($article->description)->limit(30) }}</td>
                                    <td>{{$article->category->title}}</td>
                                    <td scope="row">{{$article->created_at->diffForHumans()}}</td>
                                    <td>
                                        <x-forms.button :type="__('edit')"
                                                        :link="route('admin.articles.edit', $article->id)"></x-forms.button>

                                        <form method="POST"
                                              action="{{ route('admin.articles.destroy', $article->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm"
                                                    data-toggle="tooltip" title='Delete'>
                                                {{__('delete')}}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        {{__('no data')}}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{$articles->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">

        $('.show_confirm').click(function (event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

    </script>
@endpush
