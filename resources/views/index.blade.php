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
        <x-text.title class="text-white font-light mt-20">
            {{ __('Nothing here') }}
        </x-text.title>
        <div class="w-1/2 h-[200px] p-6 mt-20 group hover:bg-[#303030]/25 duration-[.1s] ease-out bg-[#303030]/50 rounded-3xl cursor-pointer">
            <a href="{{ route('archive') }}" class="w-1/2">
                <x-text.title class="text-white/25 group-hover:text-white duration-[.1s] ease-out font-light">
                    {{ __('Wanna see our previous games?') }}
                </x-text.title>
            </a>
        </div>
    @endif
@endsection