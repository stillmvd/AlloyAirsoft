@extends('layouts.base')

@section('alert')
    @if($alert != '')
    <x-pages.success_alert>
        {{ __($alert) }}
    </x-pages.success_alert>
    @else

    @endif
@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <p class="hidden" id="count_maps">{{ $games->count() }}</p>
    @foreach ($games as $game)

        <p class="hidden" id="first_cord{{ $loop->index }}">{{ $game->first_cord }}</p>
        <p class="hidden" id="second_cord{{ $loop->index }}">{{ $game->second_cord }}</p>

        <div class="flex w-full justify-center py-6">
            <x-text.gamedate :game='$game'/>
        </div>
        <div class="relative group w-full h-400px overflow-hidden rounded-3xl ring-2 ring-amber-500/75">
            <a href="{{ route('game', $game->id) }}">
                <div class="bg-black/75 w-full h-full p-6 z-10 absolute backdrop-blur-[3px] select-none ease-out duration-[.2s] group-hover:backdrop-blur-0 group-hover:bg-black/25">
                    <x-text.title class="text-white font-light">
                        {{ __($game->name) }}
                    </x-text.title>
                </div>
                <x-map id="map{{ $loop->index }}"/>
            </a>
        </div>
    @endforeach
@endsection

@section('footer')
    @include('includes.footer')
@endsection
