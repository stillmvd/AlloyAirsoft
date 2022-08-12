<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/css/app.css')
    <title>Please login</title>
</head>
<body class="h-[100vh] bg-[#111111] flex justify-center items-center">
    <div class="flex flex-col">
        <x-text.title class="text-center mb-10">
            {{ __('Enjoy!') }}
        </x-text.title>
        <form action="{{ route('login') }}" method="POST" class="flex flex-col w-30%">
            @csrf
            <input type="text" name="login" placeholder="login" class="text-[#FFFFFF] text-[1rem] px-5 py-4 font-light mb-[20px] rounded-2xl ring-1 ring-[#707070] bg-[#111111] focus:outline-none">
            <input type="password" name="password" placeholder="password" class="text-[#FFFFFF] text-[1rem] px-5 py-4 font-light mb-[20px] rounded-2xl ring-1 ring-[#707070] bg-[#111111] focus:outline-none">
            <input type="submit" value="penetrate" class="w-full py-4 px-6 text-[#111111] text-[2rem] font-semibold rounded-2xl bg-[#02DF8F] cursor-pointer ease duration-[.2s] hover:ring-1 hover:ring-[#02DF8F] hover:bg-transparent hover:text-white">
        </form>
        <x-text.subtitle>
            {{ $errors }}
        </x-text.subtitle>
    </div>
</body>
</html>