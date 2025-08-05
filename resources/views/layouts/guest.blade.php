<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Blog by Isaias
                Xavier</span>
        </a>
        <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 w-10 h-10
         justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2
         focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-multi-level" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1
                1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50
            md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800
            md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent
                    md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent"
                       aria-current="page">Home</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center
                    justify-between w-2/5 py-2 px-3 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent
                    md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500
                    dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Menu<svg
                                class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100
                    rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLargeButton">
                            {{--<li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600
                                dark:hover:text-white">Dashboard</a>
                            </li>--}}
                            @auth
                            <li aria-labelledby="dropdownNavbarLink">
                                <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown"
                                        data-dropdown-placement="right-start" type="button" class="flex items-center
                                        justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600
                                        dark:hover:text-white">Author Area<svg class="w-2.5 h-2.5 ms-2.5"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">

                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg></button>

                                <div id="doubleDropdown" class="z-10 hidden bg-white divide-y divide-gray-100
                                rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="doubleDropdownButton">
                                        <li>
                                            <a href="{{ route('article.create') }}" class="block px-4 py-2 hover:bg-gray-100
                                            dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Create
                                                Article</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('article.index') }}" class="block px-4 py-2 hover:bg-gray-100
                                            dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">List
                                                Articles</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('category.create') }}" class="block px-4 py-2 hover:bg-gray-100
                                            dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Create
                                                Category</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('category.index') }}" class="block px-4 py-2 hover:bg-gray-100
                                            dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">List
                                                Categories</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('tag.create') }}" class="block px-4 py-2 hover:bg-gray-100
                                            dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Create
                                                Tag</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('tag.index') }}" class="block px-4 py-2 hover:bg-gray-100
                                            dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">List
                                                Tags</a>
                                        </li>
                                    </ul>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block px-4 py-2 text-gray-700 hover:bg-gray-100
                                        dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </li>
                            @endauth
                            <li>
                                <a href="{{ route('login') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100
                                    md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white
                                    md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white
                                    md:dark:hover:bg-transparent"><span class="text-transparent">---</span>
                                    Login/Dashboard</a>
                            </li>
                        </ul>
                    </div>

                </li>
                <li>
                    <a href="{{ route('about') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100
                    md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white
                    md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white
                    md:dark:hover:bg-transparent">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


{{ $slot ?? '' }}
@yield('content')

<script src="{{ asset('js/flowbite.min.js') }}"></script>
</body>
<footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
          © 2024 <a href="https://flowbite.com/" class="hover:underline">Isaias Xavier
          </a>. All Rights Reserved. (This blog was developed in response to the challenge presented by Laraveldaily)
    </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="https://github.com/isaiasxavier" class="hover:underline me-4 md:me-6">Personal Github</a>
            </li>
            <li>
                <a href="https://github.com/isaiasxavier/bglvlch" class="hover:underline me-4 md:me-6">Project
                    Github</a>
            </li>
        </ul>
    </div>
</footer>
</html>