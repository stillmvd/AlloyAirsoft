@extends('layouts.base')

@section('content')
    <div class="w-full grid gap-6 grid-cols-1 grid-rows-3 gap-y-6 sm:grid-cols-2 sm:grid-rows-2 lg:grid-cols-3 lg:grid-rows-1 py-9">
        <b class="text-5xl font-normal self-center lg:self-end place-self-center lg:place-self-start sm:col-span-2 lg:col-span-1">
            {{ __($game->name) }}
        </b>
        <div class="w-full lg:w-min flex flex-row bg-card_bg lg:bg-transparent rounded-2xl py-6 lg:py-0 items-end justify-center lg:justify-end lg:place-self-center">
            <b class="text-5xl mr-3 font-normal">
                {{ date('d', strtotime($game->date)) }}
            </b>
            <p class="leading-6">
                {{ date('M', strtotime($game->date)) }}
            </p>
        </div>
        <div class="w-full lg:w-min bg-card_bg lg:bg-transparent rounded-2xl py-6 lg:py-0 justify-center lg:justify-end flex flex-row items-end place-self-end">
            <b class="text-5xl mr-3 font-normal">
                {{ date('g:i', strtotime($game->time))}}
            </b>
            <p class="leading-6">
                {{ ucfirst(date('a', strtotime($game->time))) }}
            </p>
        </div>
    </div>
    <div class="hidden">
        <p class="hidden" id="first_cord">{{ $first_cord }}</p>
        <p class="hidden" id="second_cord">{{ $second_cord }}</p>
        <p class="hidden" id="info">{{ $game->name }}</p>
        <p class="hidden" id="countdown">{{ $game->date . ' ' . $game->time }}</p>
        <p class="hidden" id="rules-count">{{ $rules->count() }}</p>
    </div>
    <div class="h-[500px] lg:h-[300px] w-full relative group ring-2 ring-main rounded-2xl p-6 grid overflow-hidden z-40">
        <x-elems.map id="map" />
        @unless ($game->finished)
            <x-page.downcounter/>
        @endunless
    </div>
    
    <div class="flex flex-col md:flex-row w-full mt-10 md:justify-between relative">
        <h2 id="info-title" class="mb-10 md:mb-0">
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
    </div>

    <x-elems.separator class="my-10" />

    <div class="flex flex-col md:flex-row w-full md:justify-between relative">
        <h2 id="rules-title" class="mb-10 md:mb-0">
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
    </div>

    @unless ($game->finished)
        <x-elems.separator class="mt-10" />
        @include('includes.registration')
    @endunless
    
@endsection
