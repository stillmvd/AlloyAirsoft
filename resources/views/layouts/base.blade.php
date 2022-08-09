<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/main.js') }}"></script>
    @vite('resources/css/app.css')
    <title>Alloy Airsoft</title>
</head>
<body class="h-[100vh] flex flex-col bg-[#111111]">
    @yield('header')
    <main>
        <x-pages.container>
            @yield('content')
        </x-pages.container>
    </main>
    @yield('footer')
</body>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5BMgYqx4r4s70XywuwblM-k1qi2ErGA0&callback=initMap"></script>
</html>