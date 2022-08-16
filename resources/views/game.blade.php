@extends('layouts.base')

@section('content')
    <x-page.maininfo class="items-end py-9">
        <x-text.title class="h-min text-white font-normal">
            {{ __($game->name) }}
        </x-text.title>
        <x-text.gamedate :game='$game' class="" />
        <x-text.gametime :game='$game' class="" />
    </x-page.maininfo>
    
    <x-text.cords first_cord='{{ $game->first_cord }}' second_cord='{{ $game->second_cord }}' />
    <x-gamecard.body>
        <x-elems.map id="map" />
    </x-gamecard.body>

    <x-page.gameinfo>
        <x-text.title>
            {{ __('Info') }}
        </x-text.title>
        <x-page.block class="flex-col w-[60%] h-[154px] ease-out duration-200 overflow-hidden" id="info-block">
            <x-text.subtitle class="text-white font-normal">
                {{ $infos->title }}
            </x-text.subtitle>
            <x-text.paragraph class="w-[70%]" id="info-text">
                {{ $infos->text }}
            </x-text.paragraph>
            <x-elems.arrow onclick="showInfoBlock()" id="info-arrow" />
        </x-page.block>
    </x-page.gameinfo>

    <x-elems.separator />

    <x-page.gamerules>
        <x-text.title>
            {{ __('Rules') }}
        </x-text.title>
        <x-page.block class="flex-col w-[60%] h-[180px] ease-out duration-200 overflow-hidden" id="rules-block">
            @foreach ($rules as $rule)
                <x-text.subtitle class="mb-0 text-white font-normal {{ ($loop->index > 0) ? 'mt-10' : '' }}">
                    {{ $rule->title }}
                </x-text.subtitle>
                <x-text.paragraph class="w-[70%]">
                    {{ $rule->text }}
                </x-text.paragraph>
            @endforeach
            <x-elems.arrow onclick="showRulesBlock()" id="rules-arrow" />
        </x-page.block>
    </x-page.gamerules>

    <x-elems.separator />

    @include('includes.registration')
@endsection