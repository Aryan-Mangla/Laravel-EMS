<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Event Management System') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-dark">
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
        <div class="mb-4 text-light text-center">
            <a href="/">
                
                <x-application-logo class="w-25 text-light" />
            </a>
        </div>

        <div class="w-100 col-md-6 col-lg-4 mt-3 p-4 bg-white shadow-sm rounded">
    {{ $slot }}
</div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
