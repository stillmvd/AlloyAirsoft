@extends('layouts.base')

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <p class="hidden" id="first_cord">{{ $first_cord }}</p>
    <p class="hidden" id="second_cord">{{ $second_cord }}</p>

    <div class="flex w-full justify-center py-6">
        <x-text.gamedate :game='$game'/>
    </div>

    <div class="relative group w-full h-400px overflow-hidden rounded-3xl ring-2 ring-amber-500/75">
        <div id="map" class="h-[400px] w-full bg-[#303030]/25 scale-110">
            
        </div>
    </div>
@endsection

@section('footer')
    @include('includes.footer')
@endsection