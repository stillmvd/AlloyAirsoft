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
@if (session()->get('success'))
    <p class="text-white bg-[#02DF8F] py-10 px-16 w-min whitespace-nowrap text-xl mt-2 font-light rounded flex text-center items-center justify-center slide-card absolute left-0 right-0 mx-auto">
        {{ session()->get('success') }}
    </p>
@endif
@if (session()->get('error'))
    <p class="bg-red-500 py-10 px-16 w-min whitespace-nowrap text-white text-xl mt-2 font-light rounded flex text-center items-center justify-center slide-card absolute left-0 right-0 mx-auto">
        {{ session()->get('error') }}
    </p>
@endif
<body class="h-[100vh] flex flex-col bg-[#111111]">
    <header>
        <x-pages.container>
            @auth
                @if (Route::is('admin') || Route::is('players'))
                    @include('includes.admin-header')    
                @else
                    @include('includes.header')
                @endif
            @endauth
            @guest
                @include('includes.header')
            @endguest
        </x-pages.container>
    </header>

    <main>
        <x-pages.container>
            @yield('content')
        </x-pages.container>
    </main>

    <footer>
        <x-pages.container>
            @unless (Route::is('admin') || Route::is('players'))
                @include('includes.footer')
            @endunless
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
