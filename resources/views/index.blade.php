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
            <div class="flex flex-row items-end">
                <p class="text-white text-[3rem] font-light mr-3">
                    {{ date('d', strtotime($game->playtime)) }}
                </p>
                <p class="text-white text-[1.2rem] font-light pb-3">
                    {{ date('M', strtotime($game->playtime)) }}
                </p>
            </div>
        </div>
        <div class="relative group w-full h-400px overflow-hidden rounded-3xl ring-2 ring-[#02DF8Fbf]">
            <a href="{{ route('game', $game->id) }}">
                <div class="bg-black/75 w-full h-full z-10 absolute backdrop-blur-[3px] select-none ease-out duration-[.2s] group-hover:backdrop-blur-0 group-hover:bg-black/25 flex flex-row justify-between">
                    <div class="flex flex-col">
                        <x-text.title class="text-white font-light mb-5 group-hover:bg-[#111111] group-hover:m-6 ease-out duration-[.2s] w-min p-6 rounded-3xl">
                            {{ __($game->name) }}
                        </x-text.title>
                        <div class="group-hover:bg-[#111111] group-hover:m-6 ease-out duration-[.2s] p-6 rounded-3xl w-[80%]">
                            <x-text.paragraph class="py-2 w-[80%]">
                                A 24 hours mission to find and identify signal marks on the enemy territory with small fire team.
                            </x-text.paragraph>
                            <x-text.paragraph class="py-2">
                                Number of enemy teams: unknown
                            </x-text.paragraph>
                            <x-text.paragraph class="py-2">
                                Amount of locals on the territory: unknown
                            </x-text.paragraph>
                        </div>
                    </div>
                    <div class="flex flex-col items-end">
                        <div class="flex flex-row w-min items-start group-hover:bg-[#111111] group-hover:m-6 ease-out duration-[.2s] rounded-3xl p-6">
                            @include('includes.gametime')
                        </div>
                        <x-text.paragraph class="group-hover:bg-[#111111] group-hover:m-6 p-6 rounded-3xl ease-out duration-[.2s]">
                            {{ __($game->polygon) }}
                        </x-text.paragraph>
                    </div>
                </div>
                <x-map id="map{{ $loop->index }}"/>
            </a>
        </div>
    @endforeach
@endsection

@section('footer')
    @include('includes.footer')
@endsection
