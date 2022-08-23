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
    <p class="hidden" id="countdown">
        {{ $game->date . ' ' . $game->time }}
    </p>
    <x-page.downcounter/>


    <x-page.gameinfo>
        <x-text.title id="info-title">
            {{ __('Info') }}
        </x-text.title>
        <x-page.block tabindex="0">
            <x-text.subtitle class="collapse-title font-medium text-white">
                {{ $infos->title }}
            </x-text.subtitle>
            <x-text.paragraph class="collapse-content whitespace-pre-line font-normal text-subwhite">
                {{ $infos->text }}
            </x-text.paragraph>
        </x-page.block>
    </x-page.gameinfo>

    <x-elems.separator />

    <x-page.gamerules>
        <x-text.title id="rules-title">
            {{ __('Rules') }}
        </x-text.title>
        <x-page.block tabindex="0">
            <p class="hidden" id="rules-count">{{ $rules->count() }}</p>
            @foreach ($rules as $rule)
                @if ($loop->index < 1)
                    <x-text.subtitle class="collapse-title font-medium text-white">
                        {{ $rule->title }}
                    </x-text.subtitle>
                    <x-text.paragraph class="collapse-title whitespace-pre-line font-normal mt-10 text-subwhite">
                        {{ $rule->text }}
                    </x-text.paragraph>
                @else
                <div class="">
                    <x-text.subtitle class="collapse-content font-medium text-white">
                        {{ $rule->title }}
                    </x-text.subtitle>
                    <x-text.paragraph class="collapse-content whitespace-pre-line text-subwhite">
                        {{ $rule->text }}
                    </x-text.paragraph>
                </div>
                @endif
            @endforeach
        </x-page.block>
    </x-page.gamerules>
    <x-elems.separator/>
    @include('includes.registration')
@endsection
