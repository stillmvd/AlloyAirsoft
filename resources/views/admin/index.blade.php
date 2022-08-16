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
        </x-admin.block>
        <x-admin.block>
            <x-text.subtitle class="text-white font-normal">
                {{ __('Finished games') }}
            </x-text.subtitle>
        </x-admin.block>
        <x-admin.block>
            <x-text.subtitle class="text-white font-normal">
                {{ __('Upcoming games') }}
            </x-text.subtitle>
        </x-admin.block>
    </x-admin.cards>

    <x-page.maininfo>
        <x-text.title class="col-span-3 place-self-center mt-20 mb-10">
            {{ __('Add new game') }}
        </x-text.title>
    </x-page.maininfo>

    <x-admin.form class="w-[40%] mx-auto" :count=$count>

        <x-text.subtitle class="text-[#02DF8F]">
            {{ __('Card information') }}
        </x-text.subtitle>
        <x-admin.input placeholder="Game date" type="text" name="op_date" />
        <x-admin.input placeholder="Operation name" type="text" name="op_name" />
        <x-elems.textarea placeholder="Operation short info" name="op_info" />
        <x-admin.input placeholder="Game time" type="text" name="op_time" />
        <x-admin.input placeholder="Polygon" type="text" name="op_polygon" />

        <x-text.subtitle class="text-[#02DF8F]">
            {{ __('Map coordinates') }}
        </x-text.subtitle>
        <div class="grid grid-cols-3 gap-x-6">
            <x-admin.input placeholder="First coordinates" type="text" name="first_cord" />
            <x-admin.input placeholder="Second coordinates" type="text" name="second_cord" />
            <x-admin.input type="number" placeholder="Levels" name="levels" />
        </div>

        <x-text.subtitle class="text-[#02DF8F]">
            {{ __('Game information') }}
        </x-text.subtitle>
        <x-admin.textblock>
            <x-admin.input placeholder="Title" type="text" name="title_info" />
            <x-elems.textarea placeholder="Text" name="text_info" />
        </x-admin.textblock>

        <x-text.subtitle class="text-[#02DF8F]">
            {{ __('Game rules') }}
        </x-text.subtitle>
        <x-admin.textblock class="block">
            <x-admin.input placeholder="Title" type="text" name="title" />
            <x-elems.textarea placeholder="Text" name="text" />
        </x-admin.textblock>

        <div id="added"></div>
        <input id="count" type="text" class="hidden" value="1" name="count"/>
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
