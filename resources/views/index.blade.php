@extends('layouts.base')

@section('content')
    @if ($games->count() > 0)
        @foreach ($games as $game)
            <div class="hidden boolshit">
                <p class="hidden" id="map-counter">{{ $number }}</p>
                <p class="hidden" id="first_cord{{ $loop->index }}">{{ $game->first_cord }}</p>
                <p class="hidden" id="second_cord{{ $loop->index }}">{{ $game->second_cord }}</p>
            </div>
            <div class="flex flex-row items-end justify-center my-9">
                <b class="text-5xl mr-3 font-normal">
                    {{ date('d', strtotime($game->date)) }}
                </b>
                <p class="leading-6">
                    {{ date('M', strtotime($game->date)) }}
                </p>
            </div>
            <x-elems.gamecard :loop=$loop :game=$game />
        @endforeach
    @else
        <x-text.title class="text-white font-light mt-20">
            {{ __('Nothing here') }}
        </x-text.title>
        <div class="w-1/2 h-[200px] p-6 mt-20 group hover:bg-card_bg/50 duration-[.1s] ease-out bg-card_bg rounded-3xl cursor-pointer">
            <a href="{{ route('archive') }}" class="w-1/2">
                <x-text.title class="text-white/25 group-hover:text-white duration-[.1s] ease-out font-light">
                    {{ __('Wanna see our previous games?') }}
                </x-text.title>
            </a>
        </div>
    @endif
@endsection
