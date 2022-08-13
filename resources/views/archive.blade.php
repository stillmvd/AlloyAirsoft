@extends('layouts.base')

@section('content')
    @if ($games->count() > 0)
        @foreach ($games as $game)
            <div class="flex w-full justify-center py-6">
                <x-text.gamedate :game='$game'/>
            </div>
            <a href="{{ route('game', $game->id) }}">
                <div class="h-[400px] w-full bg-[#303030]/25 rounded-3xl"></div>
            </a>
        @endforeach
    @else
        <x-text.title class="text-white font-light mt-20">
            {{ __('Nothing here') }}
        </x-text.title>
        <a href="{{ route('index') }}">
            <div class="w-1/2 h-[200px] p-6 mt-20 group hover:bg-[#303030]/25 duration-[.1s] ease-out bg-[#303030]/50 rounded-3xl">
                <x-text.title class="text-white/25 group-hover:text-white duration-[.1s] ease-out font-light">
                    {{ __('Wanna see our future games?') }}
                </x-text.title>
            </div>
        </a>
    @endif
@endsection
