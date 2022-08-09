@extends('layouts.base')

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
        <a href="{{ route('game', ['id' => $game->id]) }}" class="relative group">
            <div class="bg-[#303030]/75 w-full h-full z-10 absolute rounded-3xl backdrop-blur-[2px] select-none ease-out duration-[.2s] group-hover:backdrop-blur-0 group-hover:bg-[#303030]/50">

            </div>
            <div id="map{{ $loop->index }}" class="h-[400px] w-full bg-[#303030]/25 rounded-3xl z-0">
                
            </div>
        </a>
    @endforeach
@endsection
