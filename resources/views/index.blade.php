@extends('layouts.base')

@section('content')
    @foreach ($games as $game)
        <x-elems.counter :number=$number />
        <x-text.cords loop='{{ $loop->index }}' first_cord='{{ $game->first_cord }}' second_cord='{{ $game->second_cord }}' />
            
        <x-page.gamedate :game=$game />

        <x-elems.gamecard :loop=$loop :game=$game />
    @endforeach
@endsection