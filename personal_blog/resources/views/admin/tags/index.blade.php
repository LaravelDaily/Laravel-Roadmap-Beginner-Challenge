@extends('layouts.app')

@section('content')
    <x-messages></x-messages>
    <x-forms.button :type="__('add')" :link="route('admin.tags.create')"></x-forms.button>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('tags') }}</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('title')}}</th>
                                <th scope="col">{{__('added on')}}</th>
                                <th scope="col">{{__('actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($tags as $tag)
                                <tr>
                                    <th scope="row">{{$tag->id}}</th>
                                    <td scope="row">{{$tag->title}}</td>
                                    <td scope="row">{{$tag->created_at->diffForHumans()}}</td>
                                    <td scope="row">
                                        <x-forms.button :type="__('edit')"
                                                        :link="route('admin.tags.edit', $tag->id)"></x-forms.button>

                                        <form method="POST"
                                              action="{{ route('admin.tags.destroy', $tag->id) }}">
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
                        {{$tags->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
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
