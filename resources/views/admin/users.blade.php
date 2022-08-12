@extends('layouts.base')

@section('content')
    <div class="bg-[#303030]/25 w-full mt-20 rounded-3xl p-6">
        <x-text.title class="text-white font-light">
            {{ __('Active players') }}
        </x-text.title>

        <x-text.title class="text-white font-light">
            {{ __('Users') }}
        </x-text.title>
    </div>
@endsection