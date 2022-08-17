@extends('layouts.base')

@section('content')
<x-page.maininfo>
    <x-text.title class="col-span-3 place-self-center mt-20 mb-10">
        {{ __('Add new game') }}
    </x-text.title>
</x-page.maininfo>

<x-admin.form id="{{ $games->id }}" method="POST" class="w-[40%] mx-auto">
    
    <x-text.subtitle class="text-[#02DF8F]">
        {{ __('Card information') }}
    </x-text.subtitle>

    <x-admin.input placeholder="Game date" type="text" name="date" value="{{ $games->date }}" onblur="this.type = 'text'" onfocus="this.type = 'date'" />
    <x-admin.input placeholder="Game name" type="text" name="name" value="{{ $games->name }}" />
    <x-elems.textarea placeholder="Game short info" name="info">
        {{ $games->info }}
    </x-elems.textarea>
    <x-admin.input placeholder="Game time" type="text" name="time" onblur="this.type = 'text'" onfocus="this.type = 'time'" value="{{ $games->time }}" />
    <x-admin.input placeholder="Polygon" type="text" name="polygon" value="{{ $games->polygon }}" />

    <x-text.subtitle class="text-[#02DF8F]">
        {{ __('Map coordinates') }}
    </x-text.subtitle>
    <div class="grid grid-cols-2 gap-x-6">
        <x-admin.input placeholder="First coordinates" type="text" name="first_cord" value="{{ $games->first_cord }}"/>
        <x-admin.input placeholder="Second coordinates" type="text" name="second_cord" value="{{ $games->second_cord }}"/>
    </div>

    <x-text.subtitle class="text-[#02DF8F]">
        {{ __('Game information') }}
    </x-text.subtitle>
    <x-admin.textblock>
        <x-admin.input placeholder="Title" type="text" name="title" value="{{ $infos->title }}"/>
        <x-elems.textarea placeholder="Text" name="text">
            {{ $infos->text }}
        </x-elems.textarea>
        <x-admin.input type="number" placeholder="Levels" name="levels" value="{{ $games->levels }}"/>
    </x-admin.textblock>

    <x-text.subtitle class="text-[#02DF8F]">
        {{ __('Game rules') }}
    </x-text.subtitle>
    @for ($i = 0; $i < $rules->count(); $i++)
        <x-admin.textblock class="block">
            <x-admin.input placeholder="Title" type="text" name="title" value="{{ $rules[$i]->title }}"/>
            <x-elems.textarea placeholder="Text" name="text">
                {{ $rules[$i]->text }}
            </x-elems.textarea>
        </x-admin.textblock>
    @endfor

    <div id="added"></div>
    <input id="count" type="number" class="hidden" value="1" name="count"/>
    <x-elems.button value="Change game" />

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
