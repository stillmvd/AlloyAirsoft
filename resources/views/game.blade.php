@extends('layouts.base')

@section('content')
    <div class="w-full grid gap-6 grid-cols-1 grid-rows-3 gap-y-6 sm:grid-cols-2 sm:grid-rows-2 lg:grid-cols-3 lg:grid-rows-1 py-9">
        <b class="text-5xl font-normal self-center lg:self-end place-self-center lg:place-self-start sm:col-span-2 lg:col-span-1">
            {{ __($game->name) }}
        </b>
        <div class="w-full lg:w-min flex flex-row bg-card_bg lg:bg-transparent rounded-2xl py-6 lg:py-0 items-end justify-center lg:justify-end lg:place-self-center">
            <b class="text-5xl select-none mr-3 font-normal">
                {{ date('d', strtotime($game->date)) }}
            </b>
            <p class="leading-6 select-none">
                {{ date('M', strtotime($game->date)) }}
            </p>
        </div>
        <div class="w-full lg:w-min bg-card_bg lg:bg-transparent rounded-2xl py-6 lg:py-0 justify-center lg:justify-end flex flex-row items-end place-self-end">
            <b class="text-5xl select-none mr-3 font-normal">
                {{ date('g:i', strtotime($game->time))}}
            </b>
            <p class="leading-6 select-none">
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
        <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d4905.786327575352!2d-78.68967647122082!3d44.04751291773136!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sru!2sru!4v1667374917338!5m2!1sru!2sru" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-[660px] -top-10 lg:h-[360px] scale-[1] lg:scale-[1.1] lg:-top-[8%] ease-out duration-[.2s] absolute z-10"></iframe>
        @unless ($game->finished)
            <x-page.downcounter/>
        @endunless
    </div>
    <a href="" id="googleMap" class="w-full flex flex-row mt-4 ease-out duration-100 items-center justify-center bg-card_bg hover:bg-dark rounded-box z-10">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="stroke-main w-6 md:w-8 mr-4 my-4 group-hover:fill-dark">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
        </svg>
        <p class="leading-none">
           {{ __('Get to the map') }}
        </p>
    </a>

    <div class="flex flex-col md:flex-row w-full mt-10 md:justify-between relative">
        <h2 id="info-title" class="mb-10 md:mb-0">{{ __('Info') }}</h2>
        <x-page.block tabindex="0" onclick="createInfoSquare()" onblur="removeInfoSquare()" id="infoBlock">
            <h3 class="collapse-title text-white">{{ $infos->title }}</h3>
            <p class="collapse-content whitespace-pre-line text-white font-light">{{ $infos->text }}</p>
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
                    <h3 class="collapse-title flex flex-col text-white">{{ $rule->title }}<p class="whitespace-pre-line mt-4 text-white font-light">{{ $rule->text }}</p></h3>
                @else
                <div>
                    <h3 class="collapse-content text-white">{{ $rule->title }}</h3>
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
