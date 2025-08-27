<!DOCTYPE html>
<html lang="en">
@include('partials.header')
<body>
@include('partials.navbar')
@include('partials.error')
<div class="container">
    @yield('content')
</div>

@include('partials.js')
</body>
</html>
