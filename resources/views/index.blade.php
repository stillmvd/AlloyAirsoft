@extends('layouts.base')

@section('alert')
    @if ($success != "")
        <x-pages.alert color="amber-500">
            {{ $success }}
        </x-pages.alert>
        @else
        <x-pages.alert color="red-500">
            {{ $error }}
        </x-pages.alert>
    @endif
@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')

    @include('includes.infoblock')

    <p class="hidden" id="count_maps">{{ $games->count() }}</p>
    @foreach ($games as $game)
        <p class="hidden" id="first_cord{{ $loop->index }}">{{ $game->first_cord }}</p>
        <p class="hidden" id="second_cord{{ $loop->index }}">{{ $game->second_cord }}</p>
        
        <div class="flex w-full justify-center py-6">
            <div class="flex flex-row items-end">
                <p class="text-white text-[3rem] font-light mr-3">
                    {{ date('d', strtotime($game->playtime)) }}
                </p>
                <p class="text-white text-[1.2rem] font-light pb-3">
                    {{ date('M', strtotime($game->playtime)) }}
                </p>
            </div>
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
