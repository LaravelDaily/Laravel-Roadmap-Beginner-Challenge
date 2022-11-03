<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #575A57;" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand text-white" href="{{ route('home') }}">Personal Blog</a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 text-white" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 text-white" href="{{ route('aboutme') }}">About</a></li>
                @auth
                <li class="nav-item">
                    <ul class="nav navbar-nav mt-3">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown">{{ auth()->user()->name }}</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Inbox</a>
                                <a href="#" class="dropdown-item">Drafts</a>
                                <a href="#" class="dropdown-item">Sent Items</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item">Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 text-white" href="{{ route('login') }}">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>