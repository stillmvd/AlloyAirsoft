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
        @for ($i = 0; $i < $count; $i++)
            <x-admin.textblock>
                <x-admin.input placeholder="Title" type="text" name="title{{ $i }}" />
                <x-elems.textarea placeholder="Text" name="title{{ $i }}" />
            </x-admin.textblock>
        @endfor
        <x-elems.button value="Add game" />
    </x-admin.form>
    
    <x-admin.addform class="mx-auto my-10" :count=$count>
        <x-admin.button value="{{ 'Add columns' }}" name="add" class="bg-[#ffe260]" onclick="addColumns()" />
        <x-admin.button value="{{ 'Remove columns' }}" name="remove" class="bg-[#ff6d6d]" onclick="removeColumns()" />
    </x-admin.addform>
@endsection