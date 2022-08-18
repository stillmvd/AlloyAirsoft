@extends('layouts.base')

@section('content')
    <x-page.maininfo class="items-end py-9">
        <x-text.title class="h-min text-white font-normal">
            {{ __($game->name) }}
        </x-text.title>
        <x-text.gamedate :game='$game' />
        <x-text.gametime :game='$game' />
    </x-page.maininfo>

    <x-text.cords first_cord='{{ $game->first_cord }}' second_cord='{{ $game->second_cord }}' />
    <x-gamecard.body>
        <x-elems.map id="map" />
        <div class="hidden" id="info">
            {{ $game->name }}
        </div>
    </x-gamecard.body>

    <x-page.gameinfo>
        <x-text.title class="mb-2" id="info-title">
            {{ __('Info') }}
        </x-text.title>
        <x-page.block class="flex-col laptop:w-[60%] tablet-xl:w-[100%] tablet:w-[100%] h-[189px] ease-out duration-200 overflow-hidden" id="info-block">
            <x-text.subtitle class="text-white font-normal" id="info-subtitle">
                {{ $infos->title }}
            </x-text.subtitle>
            <x-text.paragraph class="whitespace-pre-line tablet-xl:w-[70%] tablet:w-[80%] phone:w-[80%] zero:w-[80%]" id="info-text">
                {{ $infos->text }}
            </x-text.paragraph>
            <x-elems.arrow onclick="showInfoBlock()" id="info-arrow" />
        </x-page.block>
    </x-page.gameinfo>

    <x-elems.separator />

    <x-page.gamerules>
        <x-text.title class="mb-2" id="rules-title">
            {{ __('Rules') }}
        </x-text.title>
        <x-page.block class="flex-col laptop:w-[60%] tablet-xl:w-[100%] tablet:w-[100%] ease-out duration-200 overflow-hidden h-[200px]" id="rules-block">
            <p class="hidden" id="rules-count">{{ $rules->count() }}</p>
            @foreach ($rules as $rule)
                <x-text.subtitle class="mb-0 text-white font-normal {{ ($loop->index > 0) ? 'mt-10' : '' }}" id="rules-subtitle {{ $loop->index }}">
                    {{ $rule->title }}
                </x-text.subtitle>
                <x-text.paragraph class="whitespace-pre-line tablet-xl:w-[70%] tablet:w-[80%] phone:w-[80%] zero:w-[80%]" id="rules-text {{ $loop->index }}">
                    {{ $rule->text }}
                </x-text.paragraph>
            @endforeach
            <x-elems.arrow onclick="showRulesBlock()" id="rules-arrow" />
        </x-page.block>
    </x-page.gamerules>

    <x-elems.separator />

    @include('includes.registration')
@endsection
