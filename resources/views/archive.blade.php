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
        <h2 class="mt-20">
            {{ __('Nothing here') }}
        </h2>
        <a href="{{ route('index') }}" class="flex flex-row w-min mt-6 whitespace-pre bg-dark/50 pl-6 py-6 pb-[6%] pr-[14%] rounded-2xl ease-out duration-100 hover:bg-dark">
            <p class="leading-none text-5xl">{{ __('Wanna see our 
future games?') }}</p>
        </a>
    @endif
@endsection
