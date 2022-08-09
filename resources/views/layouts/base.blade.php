<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/css/app.css')
    <title>Alloy Airsoft</title>
</head>
@yield('alert')
<body class="h-[100vh] flex flex-col bg-[#111111]">
    <header>
        <x-pages.container>
            @yield('header')
        </x-pages.container>
    </header>

    <main class="">
        <x-pages.container>
            @yield('content')
        </x-pages.container>
    </main>

    <footer>
        <x-pages.container>
            @yield('footer')
        </x-pages.container>
    </footer>
</body>

@if (Route::is('game'))
    <script src="{{ asset('js/map.js') }}"></script>
@else
    <script src="{{ asset('js/main.js') }}"></script>
@endif

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5BMgYqx4r4s70XywuwblM-k1qi2ErGA0&callback=initMap"></script>
</html>
