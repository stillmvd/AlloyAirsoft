@extends('layouts.admin')

@section('admin-content')
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
@endsection