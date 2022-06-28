<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <script src="{{ asset('theme/js/vendor.js') }}" defer></script>
    <script src="{{ asset('theme/js/app.js') }}" defer></script>
    <!-- Fonts -->
    <!-- Styles -->
    <link href="{{ asset('theme/css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">

</head>
<body>
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
