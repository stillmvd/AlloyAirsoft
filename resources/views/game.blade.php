@extends('layouts.base')

@section('content')
    <p class="hidden" id="first_cord">{{ $first_cord }}</p>
    <p class="hidden" id="second_cord">{{ $second_cord }}</p>

    <div class="flex w-full justify-center py-6">
        <x-text.gamedate :game='$game'/>
    </div>

    <div id="map" class="h-[400px] w-full rounded-3xl">
        
    </div>
@endsection