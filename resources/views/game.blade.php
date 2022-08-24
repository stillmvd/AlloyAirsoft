@extends('layouts.base')

@section('content')
    <div class="grid grid-cols-3 py-9">
        <b class="text-5xl font-normal">
            {{ __($game->name) }}
        </b>
        <div class="flex flex-row items-end place-self-center hovered">
            <b class="text-5xl mr-3 font-normal">
                {{ date('d', strtotime($game->date)) }}
            </b>
            <p class="leading-6">
                {{ date('M', strtotime($game->date)) }}
            </p>
        </div>
        <div class="flex flex-row items-end place-self-end hovered">
            <b class="text-5xl mr-3 font-normal">
                {{ date('g:i', strtotime($game->time))}}
            </b>
            <p class="leading-6">
                {{ ucfirst(date('a', strtotime($game->time))) }}
            </p>
        </div>
    </div>
    <div class="hidden boolshit">
        <p class="hidden" id="first_cord">{{ $first_cord }}</p>
        <p class="hidden" id="second_cord">{{ $second_cord }}</p>
        <p class="hidden" id="info">{{ $game->name }}</p>
        <p class="hidden" id="countdown">{{ $game->date . ' ' . $game->time }}</p>
        <p class="hidden" id="rules-count">{{ $rules->count() }}</p>
    </div>
    <x-gamecard.body>
        <x-elems.map id="map" />
    </x-gamecard.body>

    @unless ($game->finished)
        <x-page.downcounter/>
    @endunless
    
    <x-page.gameinfo>
        <h2 id="info-title">
            {{ __('Info') }}
        </h2>
        <x-page.block tabindex="0" onclick="createInfoSquare()" onblur="removeInfoSquare()" id="infoBlock">
            <h3 class="collapse-title text-white">
                {{ $infos->title }}
            </h3>
            <p class="collapse-content whitespace-pre-line text-white font-light">
                {{ $infos->text }}
            </p>
        </x-page.block>
        <div class="bg-main absolute right-0 bottom-0 w-0 h-0 rounded-2xl z-0 ease-out duration-500" id="infoSquare"></div>
    </x-page.gameinfo>

    <x-elems.separator />

    <x-page.gamerules>
        <h2 id="rules-title">
            {{ __('Rules') }}
        </h2>
        <x-page.block tabindex="0" id="rulesBlock" onclick="createRulesSquare()" onblur="removeRulesSquare()">
            @foreach ($rules as $rule)
                @if ($loop->index < 1)
                    <h3 class="collapse-title text-white">
                        {{ $rule->title }}
                    </h3>
                    <p class="collapse-title whitespace-pre-line mt-6 text-white font-light">
                        {{ $rule->text }}
                    </p>
                @else
                <div>
                    <h3 class="collapse-content text-white">
                        {{ $rule->title }}
                    </h3>
                    <p class="collapse-content whitespace-pre-line text-white font-light">{{ $rule->text }}</p>
                </div>
                @endif
            @endforeach
        </x-page.block>
        <div class="bg-main absolute right-0 bottom-0 w-0 h-0 rounded-2xl z-0 ease-out duration-500" id="rulesSquare"></div>
    </x-page.gamerules>
    @unless ($game->finished)
        <x-elems.separator/>
        @include('includes.registration')
    @endunless
@endsection
