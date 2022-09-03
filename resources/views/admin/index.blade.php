@extends('layouts.base')

@section('content')
    <div class="flex justify-center">
        <h1>
            {{ __('Admin panel') }}
        </h1>
    </div>

    <div class="grid grid-cols-3 grid-rows-1 gap-6">
        <x-admin.block>
            <h3 class="px-6 pt-6">
                {{ __('Upcoming games') }}
            </h3>
            @foreach ($games as $game)
                @if (0 == $game->finished)
                    <a href="{{ route('game', $game->id) }}" class="grid grid-cols-3 w-full justify-between mt-6 bg-dark/50 p-5 rounded-2xl ease-out duration-100 hover:bg-dark">
                        <b class="leading-none">
                            {{ $game->name }}
                        </b>
                        <div class="flex flex-row">
                            <b class="mr-3 leading-none">
                                {{ $players->where('game_id', $game->id)->count() }}
                            </b>
                            <p class="leading-none">
                                {{ __('players') }}
                            </p>
                        </div>
                        <b class="leading-none">
                            {{ $game->date }}
                        </b>
                    </a>
                @endif
            @endforeach
        </x-admin.block>
    
        <x-admin.block>
            <h3 class="px-6 pt-6">
                {{ __('Finished games') }}
            </h3>
            @if (1 > $games->where('finished', 1)->count())
                <div class="flex flex-row w-full justify-between mt-6 bg-dark p-5 rounded-2xl">
                    <b class="leading-none">
                        {{ __('No game is over yet') }}
                    </b>
                </div>
            @else
                @foreach ($games as $game)
                    @if (1 == $game->finished)
                        <a href="{{ route('game', $game->id) }}" class="grid grid-cols-3 w-full justify-between mt-6 bg-dark/50 p-5 rounded-2xl ease-out duration-100 hover:bg-dark">
                            <b class="leading-none">
                                {{ $game->name }}
                            </b>
                            <div class="flex flex-row">
                                <b class="mr-3 leading-none">
                                    {{ $players->where('id', $game->id)->count() }}
                                </b>
                                <p class="leading-none">
                                    {{ __('players') }}
                                </p>
                            </div>
                            <b class="leading-none">
                                {{ $game->date }}
                            </b>
                        </a>
                    @endif
                @endforeach
            @endif
        </x-admin.block>
    
        <x-admin.block>
            <h3 class="px-6 pt-6">
                {{ __('Statistics') }}
            </h3>
            <div class="flex flex-row w-full justify-between mt-6 bg-dark p-5 rounded-2xl">
                <b class="leading-none">
                    {{ __('Players') }}
                </b>
                <p class="leading-none">
                    {{ $players->count() }}
                </p>
            </div>
            <div class="flex flex-row w-full justify-between mt-3 bg-dark p-5 rounded-2xl">
                <b class="leading-none">
                    {{ __('Played games') }}
                </b>
                <p class="leading-none">
                    {{ $games->where('finished', '1')->count() }}
                </p>
            </div>
        </x-admin.block>
    </div>

    <div class="flex justify-center">
        <h2 class="my-10">
            {{ __('Add new game') }}
        </h2>
    </div>

    <form action="{{ route('create') }}" method="POST" class="flex flex-col gap-y-6 w-[40%] mx-auto">
        @csrf

        <h3 class="text-addictive">
            {{ __('Card information') }}
        </h3>
        <x-admin.input placeholder="Game date" type="text" name="date" onblur="this.type = 'text'" onfocus="this.type = 'date'" />
        <x-admin.input placeholder="Game name" type="text" name="name" />
        <x-elems.textarea placeholder="Game short info" name="info" />
        <x-admin.input placeholder="Game time" type="text" name="time" onblur="this.type = 'text'" onfocus="this.type = 'time'" />
        <x-admin.input placeholder="Polygon" type="text" name="polygon" />

        <h3 class="text-addictive">
            {{ __('Map coordinates') }}
        </h3>
        <div class="grid grid-cols-2 gap-x-6">
            <x-admin.input placeholder="First coordinates" type="text" name="first_cord" />
            <x-admin.input placeholder="Second coordinates" type="text" name="second_cord" />
        </div>

        <h3 class="text-addictive">
            {{ __('Game information') }}
        </h3>
        <x-admin.textblock>
            <x-admin.input placeholder="Title" type="text" name="title" />
            <x-elems.textarea placeholder="Text" name="text" />
            <x-admin.input type="number" placeholder="Levels" name="levels" />
        </x-admin.textblock>

        <h3 class="text-addictive">
            {{ __('Game rules') }}
        </h3>
        <x-admin.textblock class="block">
            <x-admin.input placeholder="Title" type="text" name="title" />
            <x-elems.textarea placeholder="Text" name="text" />
        </x-admin.textblock>

        <div id="added"></div>
        <input id="count" type="number" class="hidden" value="1" name="count"/>
        <x-elems.button value="Add game" />

    </form>

    <div class="flex justify-between w-[22%] my-10 mx-auto">
        <x-admin.button class="place-self-end hover:text-green" onclick="addColumns()">
            {{ 'Add columns' }}
        </x-admin.button>
        <x-admin.button class="place-self-start hover:text-red" onclick="removeColumns()">
            {{ 'Remove columns' }}
        </x-admin.button>
    </div>
@endsection