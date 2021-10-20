<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    {{-- antdv default styles --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ant-design-vue@2.2.8/dist/antd.min.css">

    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    @inertia
</body>

</html>
