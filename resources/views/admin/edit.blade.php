@extends('layouts.base')

@section('content')
<div class="w-full flex justify-center">
    <h1 class="text-4xl sm:text-6xl text-center sm:text-left">
        {{ __('Edit information for') }}
    </h1>
</div>

<div class="hidden boolshit"></div>
<div class="w-full relative mb-20">
    <a href="{{ route('game', strtolower($game->name)) }}">
        <div class="h-[200px] w-full lg:w-7/12 relative group ring-2 mx-auto ring-main rounded-2xl p-6 overflow-hidden z-40">

            <h1 class="absolute text-4xl md:text-6xl w-min h-[400px] md:h-[200px] whitespace-nowrap z-50 left-0 right-0 top-[12%] md:top-[6%] mx-auto">
                {{ $game->name }}
            </h1>
            <div class="w-full h-[200px] bg-bg/75 backdrop-blur-[3px] absolute top-0 left-0 z-30"></div>
            <x-elems.map id="map" class="top-0 left-0" />

        </div>
    </a>
</div>

<form action="{{ route('update', $game->id) }}" method="POST" class="flex flex-col gap-y-6 w-full md:w-[70%] lg:w-[60%] xl:w-[50%] 2xl:w-[40%] mx-auto">
    @csrf
    @method('put')

    <h3 class="text-addictive">
        {{ __('Card information') }}
    </h3>
    <x-admin.input class="bg-bg" placeholder="Game date" type="text" value="{{ $game->date }}" name="date" onblur="this.type = 'text'" onfocus="this.type = 'date'" />
    <x-admin.input class="bg-bg" placeholder="Game name" type="text" value="{{ $game->name }}" name="name" />
    <x-elems.textarea class="bg-bg" placeholder="Game short info" name="info">
        {{ $game->info }}
    </x-elems.textarea>
    <x-admin.input class="bg-bg" placeholder="Game time" type="text" value="{{ $game->time }}" name="time" onblur="this.type = 'text'" onfocus="this.type = 'time'" />
    <x-admin.input class="bg-bg" placeholder="Polygon" type="text" value="{{ $game->polygon }}" name="polygon" />

    <h3 class="text-addictive">
        {{ __('Links') }}
    </h3>
<div class="grid grid-cols-1 gap-y-6">
        <x-admin.input class="bg-bg" placeholder="Link Map Iframe" type="text" name="linkForIframe" value="{{ $game->linkForIframe }}" />
        <x-admin.input class="bg-bg" placeholder="Link Map Google" type="text" name="linkForGoogle" value="{{ $game->linkForGoogle }}" />
    </div>

    <h3 class="text-addictive">
        {{ __('Game information') }}
    </h3>
    <x-admin.textblock>
        <x-admin.input class="bg-bg" placeholder="Title" type="text" value="{{ $infos->title }}" name="title" />
        <x-elems.textarea class="bg-bg" placeholder="Text" name="text">
            {{ $infos->text }}
        </x-elems.textarea>
        <x-admin.input type="number" class="bg-bg" placeholder="Levels" value="{{ $game->levels }}" name="levels" />
    </x-admin.textblock>

    <h3 class="text-addictive">
        {{ __('Game rules') }}
    </h3>
    @for ($i = 0; $i < $rules->count(); $i++)
        <x-admin.textblock class="block">
            <x-admin.input class="bg-bg" placeholder="Title" type="text" value="{{ $rules[$i]->title }}" name="title" />
            <x-elems.textarea class="bg-bg" placeholder="Text" name="text">
                {{ $rules[$i]->text }}
            </x-elems.textarea>
        </x-admin.textblock>
    @endfor

    <div id="added"></div>
    <input id="count" type="number" class="hidden" value="1" name="count"/>
    <x-elems.button class="bg-bg py-4" value="Save" />
</form>

<div class="flex flex-col items-center md:flex-row md:justify-between w-full md:w-[50%] lg:w-[40%] xl:w-[30%] my-10 mx-auto">
    <x-admin.button class="md:place-self-end my-4 md:my-0 hover:text-green" onclick="addColumns()">
        {{ 'Add columns' }}
    </x-admin.button>
    <x-admin.button class="md:place-self-start my-4 md:my-0 hover:text-red" onclick="removeColumns()">
        {{ 'Remove columns' }}
    </x-admin.button>
</div>
@endsection
