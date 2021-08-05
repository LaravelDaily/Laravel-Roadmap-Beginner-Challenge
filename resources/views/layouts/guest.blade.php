<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body>
    <div class="flex justify-between px-4 py-2 mb-4 bg-blue-50 shadow">
      <div class="text-2xl">
        <a href="{{ route('blog') }}">
          My Nifty Blog
        </a>
      </div>
      <div>
        <a href="{{ route('static.about') }}" class="text-sm text-gray-700 underline">About</a>
        @auth
          | <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
        @else
          | <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
        @endauth
      </div>
    </div>

    <div class="font-sans text-gray-900 antialiased">
      {{ $slot }}
    </div>
  </body>
</html>
