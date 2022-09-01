@extends('layouts.base')

@section('content')
    @if ($games->count() > 0)
        @foreach ($games as $game)
            <x-elems.counter :number=$number />
            <x-text.cords loop='{{ $loop->index }}' first_cord='{{ $game->first_cord }}' second_cord='{{ $game->second_cord }}' />
                
            <x-page.gamedate :game=$game />

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
