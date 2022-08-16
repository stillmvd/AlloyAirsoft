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
        <x-admin.textblock>
            <x-admin.input placeholder="Title" type="text" name="title" />
            <x-elems.textarea placeholder="Text" name="title" />
        </x-admin.textblock>
        <div id="added"></div>
        <x-elems.button value="Add game" />
    </x-admin.form>
    <div class="flex flex-row justify-center gap-4">
        <x-admin.button value="{{ 'Add columns' }}" id="add" class="bg-[#ffe260] text-center" onclick="addColumns()" />
        <x-admin.button value="{{ 'Remove columns' }}" id="remove" class="bg-[#ff6d6d] text-center" onclick="removeColumns()" />
    </div>
@endsection
