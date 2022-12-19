@extends('layouts.base')

@section('content')
    <main class="grow"> 
        <div class="w-full flex justify-center">
            <h1 class="text-4xl sm:text-6xl">
                {{ __('Admin panel') }}
            </h1>
        </div>
    
        <div class="w-full grid grid-cols-1 grid-rows-3 lg:grid-cols-2 xl:grid-cols-3 lg:grid-rows-1 gap-6">
            <x-admin.block class="lg:col-span-2 xl:col-span-1 grow h-full">
                <h3 class="px-6 pt-6 text-2xl font-semibold lg:font-medium lg:text-3xl">
                    {{ __('Upcoming games') }}
                </h3>
                @if (1 > $games->where('finished', 0)->count())
                    <div class="flex flex-row w-full mt-6 bg-dark/50 py-10 px-6 rounded-2xl">
                        <b class="leading-none select-none">
                            {{ __('There are no games here') }}
                        </b>
                    </div>
                @else
                    @foreach ($games as $game)
                        @if (0 == $game->finished)
                            <a href="{{ route('game', $game->name) }}" class="grid grid-cols-1 gap-y-4 lg:grid-cols-3 w-full justify-between mt-6 bg-dark/50 p-5 rounded-2xl ease-out duration-100 hover:bg-dark">
                                <b class="leading-none text-2xl lg:text-base lg:leading-none select-none">
                                    {{ $game->name }}
                                </b>
                                <div class="flex flex-row">
                                    <b class="mr-3 leading-none select-none">
                                        {{ $game_players->where('game_id', $game->id)->count() }}
                                    </b>
                                    <p class="leading-none select-none">
                                        {{ __('players') }}
                                    </p>
                                </div>
                                <b class="leading-none select-none">
                                    {{ $game->date }}
                                </b>
                            </a>
                        @endif
                    @endforeach
                @endif
            </x-admin.block>
    
            <x-admin.block class="grow h-full">
                <h3 class="px-6 pt-6 text-2xl font-semibold lg:font-medium lg:text-3xl">
                    {{ __('Finished games') }}
                </h3>
                @if (1 > $games->where('finished', 1)->count())
                    <div class="flex flex-row w-full mt-6 bg-dark/50 py-10 px-6 rounded-2xl">
                        <b class="leading-none select-none">
                            {{ __('No game is over yet') }}
                        </b>
                    </div>
                @else
                    @foreach ($games as $game)
                        @if (1 == $game->finished)
                            <a href="{{ route('game', strtolower($game->name)) }}" class="grid grid-cols-1 gap-y-4 lg:grid-cols-3 w-full justify-between mt-6 bg-dark/50 p-5 rounded-2xl ease-out duration-100 hover:bg-dark">
                                <b class="leading-none text-2xl lg:text-base lg:leading-none">
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
    
            <x-admin.block class="grow h-full">
                <h3 class="px-6 pt-6 text-2xl font-semibold lg:font-medium lg:text-3xl">
                    {{ __('Statistics') }}
                </h3>
                <a href="{{ route('players') }}" class="flex flex-row w-full justify-between mt-6 bg-dark/50 p-5 rounded-2xl ease-out duration-100 hover:bg-dark">
                    <b class="leading-none select-none">
                        {{ __('Players') }}
                    </b>
                    <p class="leading-none w-3">
                        {{ $players->count() }}
                    </p>
                </a>
                <div class="flex flex-row w-full justify-between mt-3 bg-dark/50 p-5 rounded-2xl">
                    <b class="leading-none select-none">
                        {{ __('Played games') }}
                    </b>
                    <p class="leading-none w-3">
                        {{ $games->where('finished', '1')->count() }}
                    </p>
                </div>
            </x-admin.block>
        </div>
    
        <div class="w-full flex justify-center">
            <h2 class="my-10">
                {{ __('Add new game') }}
            </h2>
        </div>
    
        <form action="{{ route('create') }}" method="POST" class="flex flex-col gap-y-6 w-full md:w-[70%] lg:w-[60%] xl:w-[50%] 2xl:w-[40%] mx-auto">
            @csrf
    
            <h3 class="text-addictive">
                {{ __('Card information') }}
            </h3>
            <x-admin.input class="bg-bg" placeholder="Game date" type="text" name="date" onblur="this.type = 'text'" onfocus="this.type = 'date'" />
            <x-admin.input class="bg-bg" placeholder="Game name" type="text" name="name" />
            <x-elems.textarea class="bg-bg" placeholder="Game short info" name="info" />
            <x-admin.input class="bg-bg" placeholder="Game time" type="text" name="time" onblur="this.type = 'text'" onfocus="this.type = 'time'" />
            <x-admin.input class="bg-bg" placeholder="Polygon" type="text" name="polygon" />
    
            <h3 class="text-addictive">
                {{ __('Links') }}
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <x-admin.input class="bg-bg" placeholder="Link Map Iframe" type="text" name="linkForIframe" />
                <x-admin.input class="bg-bg" placeholder="Link Map Google" type="text" name="linkForGoogle" />
            </div>
    
            <h3 class="text-addictive">
                {{ __('Game information') }}
            </h3>
            <x-admin.textblock>
                <x-admin.input class="bg-bg" placeholder="Title" type="text" name="title" />
                <x-elems.textarea class="bg-bg" placeholder="Text" name="text" />
                <x-admin.input min="1" max="3" type="number" class="bg-bg" placeholder="Levels" name="levels" />
            </x-admin.textblock>
    
            <h3 class="text-addictive">
                {{ __('Game rules') }}
            </h3>
            <x-admin.textblock class="block">
                <x-admin.input class="bg-bg" placeholder="Title" type="text" name="title" />
                <x-elems.textarea class="bg-bg" placeholder="Text" name="text" />
            </x-admin.textblock>
    
            <div id="added"></div>
            <input id="count" type="number" class="hidden" value="1" name="count"/>
            <x-elems.button class="bg-bg py-4" value="Add game" />
    
        </form>
    
        <div class="flex flex-col items-center md:flex-row md:justify-between w-full md:w-[50%] lg:w-[40%] xl:w-[30%] my-10 mx-auto">
            <x-admin.button class="md:place-self-end my-4 md:my-0 hover:text-green" onclick="addColumns()">
                {{ 'Add columns' }}
            </x-admin.button>
            <x-admin.button class="md:place-self-start my-4 md:my-0 hover:text-red" onclick="removeColumns()">
                {{ 'Remove columns' }}
            </x-admin.button>
        </div>
    </main>
@endsection
