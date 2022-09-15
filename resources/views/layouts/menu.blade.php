<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? "active" : null}}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('articles.index') }}" class="nav-link {{ request()->routeIs('articles.index') ? "active" : null}}">
        <i class="nav-icon fas fa-columns"></i>
        <p>Articles</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.index') ? "active" : null}}">
        <i class="nav-icon fas fa-table"></i>
        <p>Categories</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('tags.index') }}" class="nav-link {{ request()->routeIs('tags.index') ? "active" : null}}">
        <i class="nav-icon fas fa-book"></i>
        <p>Tags</p>
    </a>
</li>

