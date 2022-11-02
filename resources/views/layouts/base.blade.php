<!DOCTYPE html>
<html lang="en" class="bg-bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/css/app.css')
    <title>@yield('title','Alloy Airsoft')</title>
</head>

@if ($message = session()->get('success'))
    <x-elems.alert class="alert-success w-screen sm:w-min">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span class="whitespace-normal sm:whitespace-nowrap">{{ $message }}</span>
    </x-elems.alert>
@endif
@if ($message = session()->get('error'))
    <x-elems.alert class="alert-error w-screen sm:w-min">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span class="whitespace-normal sm:whitespace-nowrap">{{ $message }}</span>
    </x-elems.alert>
@endif

<body class="min-h-screen container px-6 flex flex-col selection:bg-dark selection:text-main">
    @include('includes.header')

    <main class="flex flex-col w-full items-start">
        @yield('content')
    </main>

    @unless (Route::is('admin') || Route::is('players') || Route::is('edit') || Route::is('credential') || Route::is('register') || Route::is('login') || Route::is('personal_account') || Route::is('account'))
        @include('includes.footer')
    @endunless
</body>

<script src="{{ asset('js/header.js') }}"></script>

@if (Route::is('game'))
    <script src="{{ asset('js/map.js') }}"></script>
@elseif (Route::is('admin') || Route::is('edit'))
    <script src="{{ asset('js/map.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
@elseif (Route::is('account'))
    <script src="{{ asset('js/input.js') }}"></script>
@else
    <script src="{{ asset('js/main.js') }}"></script>
@endif

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5BMgYqx4r4s70XywuwblM-k1qi2ErGA0&callback=initMap"></script>
</html>
