@extends('layouts.base')

@section('content')
    <div class="grid grid-cols-3 gap-10 mt-20">
        <div class="w-full h-[300px] p-6 bg-[#303030]/25 rounded-3xl">
            <x-text.title class="text-white font-light">
                {{ __('Upcoming games') }}
            </x-text.title>
        </div>
        <div class="w-full h-[300px] p-6 bg-[#303030]/25 rounded-3xl">
            <x-text.title class="text-white font-light">
                {{ __('Finished games') }}
            </x-text.title>
        </div>
        <div class="w-full h-[300px] p-6 bg-[#303030]/25 rounded-3xl">
            <x-text.title class="text-white font-light">
                {{ __('Statistics') }}
            </x-text.title>
        </div>
    </div>
    <form method="POST" action="{{ route('create', ['count' => $count, 'game_id' => 1001]) }}" class="mt-10 flex flex-col justify-center m-auto w-1/2">
        @csrf
        @for ($i = 0; $i < $count; $i++)
        <div class="flex flex-col justify-between h-[200px]">
            <input type="text" name="title{{ $i }}" class="w-full box-border text-white text-[1.1rem] px-5 py-2 font-medium rounded-2xl ring-2 ring-[#707070] bg-transparent">
            <textarea type="text" name="text{{ $i }}" class="mb-5 h-[118px] w-full box-border text-white text-[1.1rem] px-5 py-2 font-medium rounded-2xl ring-2 ring-[#707070] bg-transparent resize-none"></textarea>
        </div>
        @endfor
        <input type="submit" value="{{ __('Add Game') }}" class='py-4 px-6 col-span-1 text-white text-[1.7rem] font-semibold rounded-2xl bg-transparent ring-2 ring-[#02DF8F] cursor-pointer ease duration-[.2s] hover:ring-2 hover:ring-transparent hover:bg-[#02DF8F] hover:text-[#111111]'/>
    </form>
    <form method="POST" action="{{ route('changeInputs', ['count' => $count]) }}" class="flex justify-between m-auto w-[100px] mt-6">
        @csrf
        <input value="{{ __('Add') }}" type="submit" name="Add" class="flex items-center justify-center cursor-pointer rounded-sm font-bold text-[#111] bg-[#02DF8F]"/>
        <input value="{{ __('Remove') }}" type="submit" name="Remove" class="flex items-center justify-center cursor-pointer rounded-sm font-bold text-[#111] bg-red-500"/>
    </form>
@endsection
