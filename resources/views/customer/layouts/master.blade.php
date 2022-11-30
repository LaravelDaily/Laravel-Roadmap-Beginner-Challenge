<!DOCTYPE html>
<html>
<head>
    @include('customer.layouts.head-tag')
    @yield('head-tag')
    @stack('head-tag')
</head>
<body>

    <section class="p-2 container mx-auto">
        @yield('content')
    </section>

    @yield('script')
    @stack('script')
</body>
</html>
