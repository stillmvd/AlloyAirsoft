@extends('layouts.base')

@section('header')
    @include('includes.header')
@endsection

@section('content')
    @foreach ($games as $game)
        <div class="flex w-full justify-center py-6">
            <x-text.gamedate :game="$game" />
        </div>
        <div class="h-[400px] w-full bg-[#303030]/25 rounded-3xl">
            <a href="{{ route('game', 1001) }}">1</a>
        </div>
    @endforeach
@endsection
