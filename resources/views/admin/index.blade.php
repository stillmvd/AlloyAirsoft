@extends('layouts.base')

@section('content')
    <x-page.maininfo>
        <x-text.title class="col-span-3 place-self-center mt-20 mb-10">
            {{ __('Admin information') }}
        </x-text.title>
    </x-page.maininfo>

    <x-admin.cards>
        <x-admin.block>
            <x-text.subtitle class="text-white font-normal">
                {{ __('Upcoming games') }}
            </x-text.subtitle>
            @foreach ($games as $game)
                @if ($game->finished == 0)
                    <div class="flex flex-row w-full justify-between mt-3">
                        <x-text.link href="{{ route('game', $game->id) }}" class="text-[#CACACA] font-normal">
                            {{ $game->name }}
                        </x-text.link>
                        <div class="flex flex-row">
                            <x-text.paragraph class="text-[#CACACA] font-normal mr-2">
                                {{ $players->where('id', $game->id)->count() }}
                            </x-text.paragraph>
                            <x-text.paragraph>
                                {{ __('players') }}
                            </x-text.paragraph>
                        </div>
                        <x-text.paragraph>
                            {{ $game->date }}
                        </x-text.paragraph>
                    </div>
                @endif
            @endforeach
        </x-admin.block>

        <x-admin.block>
            <x-text.subtitle class="text-white font-normal">
                {{ __('Finished games') }}
            </x-text.subtitle>
            @foreach ($games as $game)
                @if ($game->finished == 1)
                    <div class="flex flex-row w-full justify-between mt-3">
                        <x-text.link href="{{ route('game', $game->id) }}" class="text-[#CACACA] font-normal">
                            {{ $game->name }}
                        </x-text.link>
                        <div class="flex flex-row">
                            <x-text.paragraph class="text-[#CACACA] font-normal mr-2">
                                {{ $players->where('id', $game->id)->count() }}
                            </x-text.paragraph>
                            <x-text.paragraph>
                                {{ __('players') }}
                            </x-text.paragraph>
                        </div>
                        <x-text.paragraph>
                            {{ $game->date }}
                        </x-text.paragraph>
                    </div>
                @endif
            @endforeach
        </x-admin.block>

        <x-admin.block>
            <x-text.subtitle class="text-white font-normal">
                {{ __('Statistics') }}
            </x-text.subtitle>
            <div class="flex flex-row w-full justify-between mt-3">
                <x-text.link class="text-[#CACACA] font-normal">
                    {{ __('Players') }}
                </x-text.link>
                <x-text.paragraph>
                    {{ $players->count() }}
                </x-text.paragraph>
            </div>
            <div class="flex flex-row w-full justify-between mt-3">
                <x-text.link class="text-[#CACACA] font-normal">
                    {{ __('Played games') }}
                </x-text.link>
                <x-text.paragraph>
                    {{ $games->where('finished', '1')->count() }}
                </x-text.paragraph>
            </div>
        </x-admin.block>
    </x-admin.cards>

    <x-page.maininfo>
        <x-text.title class="col-span-3 place-self-center mt-20 mb-10">
            {{ __('Add new game') }}
        </x-text.title>
    </x-page.maininfo>

    <x-admin.form action="{{ route('create') }}" class="w-[40%] mx-auto">

        <x-text.subtitle class="text-[#02DF8F]">
            {{ __('Card information') }}
        </x-text.subtitle>
        <x-admin.input placeholder="Game date" type="text" name="date" onblur="this.type = 'text'" onfocus="this.type = 'date'" />
        <x-admin.input placeholder="Game name" type="text" name="name" />
        <x-elems.textarea placeholder="Game short info" name="info" />
        <x-admin.input placeholder="Game time" type="text" name="time" onblur="this.type = 'text'" onfocus="this.type = 'time'" />
        <x-admin.input placeholder="Polygon" type="text" name="polygon" />

        <x-text.subtitle class="text-[#02DF8F]">
            {{ __('Map coordinates') }}
        </x-text.subtitle>
        <div class="grid grid-cols-2 gap-x-6">
            <x-admin.input placeholder="First coordinates" type="text" name="first_cord" />
            <x-admin.input placeholder="Second coordinates" type="text" name="second_cord" />
        </div>

        <x-text.subtitle class="text-[#02DF8F]">
            {{ __('Game information') }}
        </x-text.subtitle>
        <x-admin.textblock>
            <x-admin.input placeholder="Title" type="text" name="title" />
            <x-elems.textarea placeholder="Text" name="text" />
            <x-admin.input type="number" placeholder="Levels" name="levels" />
        </x-admin.textblock>

        <x-text.subtitle class="text-[#02DF8F]">
            {{ __('Game rules') }}
        </x-text.subtitle>
        <x-admin.textblock class="block">
            <x-admin.input placeholder="Title" type="text" name="title" />
            <x-elems.textarea placeholder="Text" name="text" />
        </x-admin.textblock>

        <div id="added"></div>
        <input id="count" type="number" class="hidden" value="1" name="count"/>
        <x-elems.button value="Add game" />

    </x-admin.form>
    <div class="flex justify-between w-[26%] my-10 mx-auto">
        <x-admin.button class="place-self-end hover:text-[#02DF8F]" onclick="addColumns()">
            {{ 'Add columns' }}
        </x-admin.button>
        <x-admin.button class="place-self-start hover:text-[#ce2f2f]" onclick="removeColumns()">
            {{ 'Remove columns' }}
        </x-admin.button>
    </div>
@endsection
