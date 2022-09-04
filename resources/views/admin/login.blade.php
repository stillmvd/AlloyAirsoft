<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/css/app.css')
    <title>Wrong Door</title>
</head>
<body class="h-[100vh] bg-[#161616] flex justify-center items-center" id="body">
    <div class="flex flex-col items-center gap-y-10">
        <h2>
            {{ __('Enjoy!') }}
        </h2>
        <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-y-5">
            @csrf
            <x-admin.input placeholder="Login" type="text" name="login" />
            <x-admin.input placeholder="Password" type="password" name="password" />
            <x-elems.button value="Penetrate" />
        </form>
    </div>
</body>
</html>