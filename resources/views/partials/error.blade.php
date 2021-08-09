    {{-- error validate --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- error validate --}}

    {{-- ini untuk transaksi error --}}
    @if (\Session::has('alert'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> {{ Session::get('alert') }}</h5>
    </div>
    @endif
    {{-- ini untuk transaksi error --}}

    {{-- ini untuk transaksi berhasil --}}
    @if (\Session::has('alert-success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> {{ Session::get('alert-success') }}</h5>
    </div>
    @endif
    {{-- ini untuk transaksi berhasil --}}
