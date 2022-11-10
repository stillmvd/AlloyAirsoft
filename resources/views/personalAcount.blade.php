@extends('layouts.base')

@section('title', 'Personal Acount')

@section('content')
    <div class="grid sm:hidden lg:grid w-full 2xl:w-[90%] grid-cols-1 lg:grid-cols-3 gap-10 mx-auto my-20">
        <div class="w-[100%] rounded-2xl bg-card_bg/50 p-6">
            <h3>
                Your games
            </h3>
                    @foreach ($games as $game)
                            <div class="mt-10">
                                <a href="{{ route('game', $game->name) }}" class="bg-dark/75 hover:bg-dark w-full p-4 rounded-xl mt-4">
                                    {{ $game->name }}
                                </a>
                            </div>
                    @endforeach
        </div>
        <div class="w-[100%] rounded-2xl bg-card_bg/50 p-6">
            <img src="{{ asset(Auth::user()->pathToAvatar) }}" alt="avatar" class="w-28 h-28 mx-auto rounded-full">
            <form method="POST" action="{{ route('saveAvatar') }}" enctype="multipart/form-data">
                @csrf
                <input type="file" title=" " name="avatar" class="block w-full text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-violet-50 file:text-violet-700
                hover:file:bg-violet-100
                "/>
                <input type="submit" value="Сохранить">
            </form>
            <div class="bg-dark w-full p-4 rounded-xl mt-10">
                <b>
                    Email
                </b>
                <p>
                    {{ Auth::user()->email }}
                </p>
            </div>
            <div class="bg-dark w-full p-4 rounded-xl mt-4">
                <b>
                    Registered
                </b>
                <p>
                    {{ Auth::user()->created_at }}
                </p>
            </div>
        </div>
        <div class="w-[100%] rounded-2xl bg-card_bg/50 p-6">
            <h3>
                Your achievements
            </h3>
        </div>
    </div>
    <div class="hidden sm:grid lg:hidden w-8/9 grid-cols-1 sm:grid-cols-2 gap-10 mx-auto my-20">
        <div class="w-[100%] col-span-2 rounded-2xl bg-card_bg/50 p-6">
            <img src="{{ asset('image/Leather.jpg') }}" alt="avatar" class="w-28 h-28 mx-auto rounded-full">
            <div class="bg-dark w-full p-4 rounded-xl mt-10">
                <b>
                    Email
                </b>
                <p>
                    {{ Auth::user()->email }}
                </p>
            </div>
            <div class="bg-dark w-full p-4 rounded-xl mt-4">
                <b>
                    Registered
                </b>
                <p>
                    {{ Auth::user()->created_at }}
                </p>
            </div>
        </div>
        <div class="w-[100%] rounded-2xl bg-card_bg/50 p-6">
            <h3>
                Your games
            </h3>
        </div>
        <div class="w-[100%] rounded-2xl bg-card_bg/50 p-6">
            <h3>
                Your achievements
            </h3>
        </div>
    </div>
@endsection
