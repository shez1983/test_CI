<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Routes -->
        @routes

        <!-- Styles -->
        @vite(['resources/sass/app.scss'])

    </head>

    <body class="font-sans antialiased">


        @include('layout.header')

        @yield('content')

        @include('layout.footer')

        @vite(['resources/js/app.js'])
    </body>
</html>
