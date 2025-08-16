<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                @auth
                    <x-ul.li :value="__('home')" :link="route('home')"></x-ul.li>
                    <x-ul.li :value="__('categories')" :link="route('admin.categories.index')"></x-ul.li>
                    <x-ul.li :value="__('tags')" :link="route('admin.tags.index')"></x-ul.li>
                    <x-ul.li :value="__('articles')" :link="route('admin.articles.index')"></x-ul.li>
                @endauth
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                @else
                    {{--                    <ul class="navbar-nav ms-auto">--}}
                    {{--                        <li class="nav-item dropdown">--}}
                    {{--                            <a href="lang/ar"--}}
                    {{--                               style="{{app()->getLocale() == 'ar'? 'pointer-events: none; cursor: default;color: grey': ''}}">--}}
                    {{--                                {{__('Arabic')}}--}}
                    {{--                                <img src="{{ asset('vendor/blade-flags/country-eg.svg') }}" width="32" height="32"/>--}}
                    {{--                            </a>--}}

                    {{--                        </li>--}}
                    {{--                        <li class="nav-item dropdown">--}}
                    {{--                            <a href="lang/en"--}}
                    {{--                               style="{{app()->getLocale() == 'en'? 'pointer-events: none; cursor: default; color: grey': ''
                    }}">--}}
                    {{--                                {{__('English')}}--}}
                    {{--                                <img src="{{ asset('vendor/blade-flags/country-us.svg') }}" width="32" height="32"/>--}}
                    {{--                            </a>--}}
                    {{--                        </li>--}}
                    {{--                    </ul>--}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
