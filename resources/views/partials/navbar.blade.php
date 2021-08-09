<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="#">Logo</a>

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('articles.index') }}">Article</a>
        </li>
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
        @endguest
        @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tags.index') }}">Tag</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">Category</a>
            </li>
            <li class="nav-item">
                <form class="btn btn-sm" action="{{ route('logout') }}" method="post">
                    @method('POST')
                    @csrf
                    <button type="submit"class="btn-sm btn-danger">
                        Logout
                    </button>
                </form>
            </li>
        @endauth
    </ul>
  </nav>
