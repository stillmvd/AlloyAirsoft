@extends('layouts.base')

@section('content')
    <div class="bg-[#303030]/25 w-full mt-20 rounded-3xl p-6">
        <x-text.title class="text-white font-light">
            {{ __('Players') }}
        </x-text.title>
        <x-admin.name_col_players/>
        @for ($i = 0; $i < $players_count; $i++)
            <div class="grid grid-cols-1">
                <p class="text-white text-[1rem] pt-10 text-center">{{ $players[$i]->id }}</p>
                <p class="text-white text-[1rem] pt-10 text-center">{{ $players[$i]->created_at }}</p>
                <p class="text-white text-[1rem] pt-10 text-center">{{ $players[$i]->updated_at }}</p>
                <p class="text-white text-[1rem] pt-10 text-center">{{ $players[$i]->game_id }}</p>
                <p class="text-white text-[1rem] pt-10 text-center">{{ $players[$i]->name }}</p>
                <p class="text-white text-[1rem] pt-10 text-center">{{ $players[$i]->surname }}</p>
                <p class="text-white text-[1rem] pt-10 text-center">{{ $players[$i]->callsign }}</p>
                <p class="text-white text-[1rem] pt-10 text-center col-span-2">{{ $players[$i]->email }}</p>
                <p class="text-white text-[1rem] pt-10 text-center col-span-2">{{ $players[$i]->phone }}</p>
                <p class="text-white text-[1rem] pt-10 text-center pl-10">{{ $players[$i]->team_id }}</p>
            </div>
        @endfor

    </div>
    <div class="bg-[#303030]/25 w-full mt-20 rounded-3xl p-6">
        <x-text.title class="text-white font-light">
            {{ __('Games') }}
        </x-text.title>
        <x-admin.name_col_games/>
        @for ($i = 0; $i < $games_count; $i++)
            <div class="grid grid-cols-1 grid-flow-col">
                <p class="text-white text-[1rem] pt-10 text-center">{{ $games[$i]->id }}</p>
                <p class="text-white text-[1rem] pt-10 text-center">{{ $games[$i]->created_at }}</p>
                <p class="text-white text-[1rem] pt-10 text-center">{{ $games[$i]->updated_at }}</p>
                <p class="text-white text-[1rem] pt-10 text-center">{{ $games[$i]->name }}</p>
                <p class="text-white text-[1rem] pt-10 text-center">{{ $games[$i]->first_cord }}</p>
                <p class="text-white text-[1rem] pt-10 text-center">{{ $games[$i]->second_cord }}</p>
                <p class="text-white text-[1rem] pt-10 text-center col-span-2">{{ $games[$i]->polygon }}</p>
                <p class="text-white text-[1rem] pt-10 text-center col-span-2">{{ $games[$i]->description }}</p>
                <p class="text-white text-[1rem] pt-10 text-center pl-10">{{ $games[$i]->playtime }}</p>
                <p class="text-white text-[1rem] pt-10 text-center pl-10">{{ $games[$i]->levels }}</p>
                <p class="text-white text-[1rem] pt-10 text-center pl-10">{{ $games[$i]->tags_icon }}</p>
                <p class="text-white text-[1rem] pt-10 text-center pl-10">{{ $games[$i]->finished }}</p>
            </div>
        @endfor

    </div>
    <div class="bg-[#303030]/25 w-full mt-20 rounded-3xl p-6">
        <x-text.title class="text-white font-light">
            {{ __('Emails') }}
        </x-text.title>
        <x-admin.name_col_emails/>
        @for ($i = 0; $i < $emails_count; $i++)
            <div class="grid grid-cols-1 grid-flow-col">
                <p class="text-white text-[1rem] pt-10 text-center">{{ $emails[$i]->id }}</p>
                <p class="text-white text-[1rem] pt-10 text-center">{{ $emails[$i]->created_at }}</p>
                <p class="text-white text-[1rem] pt-10 text-center">{{ $emails[$i]->updated_at }}</p>
                <p class="text-white text-[1rem] pt-10 text-center">{{ $emails[$i]->email }}</p>
            </div>
        @endfor

    </div>
@endsection
