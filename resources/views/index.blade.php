@extends('layouts.base')

@section('content')
    @foreach ($games as $game)
        <x-elems.counter :number=$number />

        <x-text.cords :loop=$loop :game=$game />
        <x-text.gamedate :game=$game />

        <x-elems.gamecard :loop=$loop :game=$game />
    @endforeach
@endsection