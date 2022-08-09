@extends('layouts.base')

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <p class="hidden" id="first_cord">{{ $first_cord }}</p>
    <p class="hidden" id="second_cord">{{ $second_cord }}</p>

    <div class="flex w-full justify-between items-center py-6">
        <x-text.title class="text-white">
            {{ __($game->name) }}
        </x-text.title>
        <x-text.gamedate :game='$game'/>
        <x-text.gametime :game='$game'/>
    </div>

    <div class="relative group w-full h-400px overflow-hidden rounded-3xl">
        <div id="map" class="h-[400px] w-full bg-[#303030]/25 scale-110">

        </div>
    </div>
@endsection
