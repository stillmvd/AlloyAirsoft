@extends('layouts.base')

@section('content')
    <main class="grow">

{{-- information about the game --}}
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

{{-- map card --}}
        <div class="hidden">
            <p class="hidden" id="info">{{ $game->name }}</p>
            <p class="hidden" id="countdown">{{ $game->date . ' ' . $game->time }}</p>
            <p class="hidden" id="rules-count">{{ count($rules) }}</p>
        </div>
        <div class="h-[500px] lg:h-[300px] w-full flex justify-between relative group ring-2 ring-main rounded-xl p-5 overflow-hidden z-40">
            <iframe src="{{ $game->linkForIframe }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-[560px] lg:h-[360px] group-hover:scale-[1.2] top-0 lg:-top-10 scale-[1.28] lg:scale-[1.1] ease-out duration-[.2s] absolute z-10"></iframe>
            <div class="flex flex-col sm:flex-row gap-y-6 w-full justify-end sm:justify-between items-center">
                @if ($game->finished)
                    <h3 class="z-40 place-self-start self-end bg-card_bg rounded-xl px-6 py-3">{{ __('Finished') }}</h3>
                @else
                    <x-page.downcounter/>
                @endif
                <a href="{{ $game->linkForGoogle }}" target="_blank" id="googleMap" class="w-min flex flex-row ease-out duration-100 bg-card_bg hover:bg-dark rounded-xl items-center py-2 px-4 z-40 sm:place-self-end sm:self-end">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="stroke-main w-6 md:w-8 mr-4 group-hover:fill-dark">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                    </svg>
                    <p class="leading-none whitespace-nowrap">{{ __('Get to the map') }}</p>
                </a>
            </div>
        </div>

{{-- prices section --}}
        {{-- Проверяем что пользователь вошел --}}
        @if(Auth::user() != NULL)
            {{-- Если пользователь не админ --}}
            @if(!Auth::user()->isAdmin)
                {{-- Если пользователь заполнил данные --}}
                @if (fillPlayer())
                    {{-- Если он уже выбрал цену --}}
                    @if(Auth::user()->player->price != NULL)
                        <div class="mt-10 flex flex-col md:flex-row w-full md:justify-between relative">
                            <div class="grid grid-cols-2 gap-x-48 justify-between w-full px-6 pb-6 bg-card_bg/75 rounded-xl">
                                <h2 class="col-span-2 my-8">{{ __('Check your game ticket') }}</h2>
                                <div class="bg-dark/75 rounded-xl p-6 flex flex-row">
                                    <b class="text-subwhite text-2xl">{{ __('Your team:') }}</b>
                                    <h3 class="ml-3">{{ DB::table('teams')->where('id', Auth::user()->player->team_id)->get()->value('name') }}</h3>
                                </div>
                                <div class="bg-dark/75 rounded-xl p-6 flex flex-row">
                                    <b class="text-subwhite text-2xl">{{ __('Cost of your ticket:') }}</b>
                                    <h3 class="ml-3">{{ Auth::user()->player->price }}</h3>
                                </div>
                            </div>
                        </div>
                            <x-elems.separator class="my-10" />
                    {{-- Если не выбрал --}}
                    @else
                        <div class="mt-10 flex flex-col md:flex-row w-full md:justify-between relative">
                            <h2 id="prices-title" class="mb-10 md:mb-0">{{ __('Prices') }}</h2>
                            <div class="flex flex-row justify-between w-full md:w-[70%] xl:w-[60%] p-4 bg-card_bg/75 rounded-xl">
                                <form action="{{ route('storePrice', strtolower($game->name)) }}" method="post" class="flex w-full sm:justify-between flex-col sm:flex-row">
                                    @csrf
                                    <div class="">
                                        <div class="flex flex-col gap-y-6 sm:gap-y-0 sm:flex-row items-center mb-4">
                                            <h3>{{ __('Total price:') }}</h3>
                                            <h3 id="finalyPrice" class="flex items-center font-semibold leading-none tracking-wide bg-[#419253] p-2 rounded-xl ml-2 select-none">0$</h3>
                                        </div>
                                        @foreach ($prices as $price)
                                            <div class="flex flex-row items-center">
                                                <input type="checkbox" name="{{ $price->name }}" id="{{ $price->name }}" />
                                                <label class="label cursor-pointer w-min" for="{{ $price->name }}">
                                                    <span class="label-text whitespace-nowrap leading-none ml-2 text-subwhite text-base">
                                                        {{ $price->name }}
                                                    </span>
                                                    <span class="label-text whitespace-nowrap leading-none ml-2 text-white text-base">
                                                        {{ $price->price . '$' }}
                                                    </span>
                                                </label>
                                            </div>
                                        @endforeach
                                        <input id="price" class="hidden" type="text" name="price" value="" />
                                    </div>
                                    <div class="w-full sm:w-min flex items-end">
                                        <x-elems.button class="py-1 px-10 w-full mt-3 sm:mt-0" value="Play" />
                                    </div>
                                </form>
                            </div>
                        </div>
                        <x-elems.separator class="my-10" />
                    @endif
                {{-- Если не заполнил данные --}}
                @else
                    <div class="mt-10 flex flex-col md:flex-row w-full md:justify-between relative">
                        <h2 id="prices-title" class="mb-10 md:mb-0">{{ __('Prices') }}</h2>
                        <div class="flex flex-row justify-between w-full md:w-[70%] xl:w-[60%] p-4 bg-card_bg/75 rounded-xl">
                            <div class="flex w-full sm:justify-between flex-col sm:flex-row">
                                @csrf
                                <div class="">
                                    <div class="flex flex-col gap-y-6 sm:gap-y-0 sm:flex-row items-center mb-4">
                                        <h3>{{ __('Total price:') }}</h3>
                                        <h3 id="finalyPrice" class="flex items-center font-semibold leading-none tracking-wide bg-[#419253] p-2 rounded-xl ml-2 select-none">0$</h3>
                                    </div>
                                    @foreach ($prices as $price)
                                        <div class="flex flex-row items-center">
                                            <input type="checkbox" name="{{ $price->name }}" id="{{ $price->name }}" />
                                            <label class="label cursor-pointer w-min" for="{{ $price->name }}">
                                                <span class="label-text whitespace-nowrap leading-none ml-2 text-subwhite text-base">
                                                    {{ $price->name }}
                                                </span>
                                                <span class="label-text whitespace-nowrap leading-none ml-2 text-white text-base">
                                                    {{ $price->price . '$' }}
                                                </span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
{{-- modal windows with personal details --}}
                                <div class="w-full sm:w-min flex items-end">
                                    <label for="my-modal-3" class="py-1 sm:whitespace-nowrap px-10 w-full flex justify-center mt-3 sm:mt-0 text-white text-[1.7rem] font-semibold rounded-xl ring-main ring-2 cursor-pointer ease-out duration-200 hover:bg-main hover:text-dark">{{ __('Play') }}</label>
                                    <input type="checkbox" id="my-modal-3" class="modal-toggle" />
                                    <div class="modal modal-bottom sm:modal-middle">
                                        <div class="modal-box bg-bg relative">
                                            <label for="my-modal-3" class="rounded-full flex items-center justify-center w-8 h-8 bg-dark text-white absolute right-4 top-4">✕</label>
                                            <h3 class="select-none">Please, fill your personal missing details</h3>
                                            <form action="{{ route('changeCredentialForUser') }}" method="POST" class="flex flex-col gap-y-4 my-6">
                                                @csrf
                                                <fieldset>
                                                    <label for="name">{{ __('name') }}</label>
                                                    <input type="text" id="name" name="namePlayer" value="{{ Auth::user()->player->name }}">
                                                </fieldset>
                                                <fieldset>
                                                    <label for="surname">{{ __('surname') }}</label>
                                                    <input type="text" id="surname" name="surnamePlayer" value="{{ Auth::user()->player->surname }}">
                                                </fieldset>
                                                <fieldset>
                                                    <label for="callsign">{{ __('callsign') }}</label>
                                                    <input type="text" id="callsign" name="callsignPlayer" value="{{ Auth::user()->player->callsign }}">
                                                </fieldset>
                                                <fieldset>
                                                    <label for="phone">{{ __('phone') }}</label>
                                                    <input type="text" id="phone" name="phonePlayer" value="{{ Auth::user()->player->phone }}">
                                                </fieldset>
                                                <x-elems.button value="Save" class="mx-auto mt-6" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-elems.separator class="my-10" />
                @endif
            {{-- Если юзер админ --}}
            @else
                @if (Auth::user()->isAdmin)
                    <div class="mt-10 flex flex-col md:flex-row w-full md:justify-between relative">
                        <h2 id="prices-title" class="mb-10 md:mb-0">{{ __('Prices') }}</h2>
                        <div class="flex flex-row justify-between w-full md:w-[70%] xl:w-[60%] p-4 bg-card_bg/75 rounded-xl">
                            <h2 id="prices-title" class="flex m-auto">{{ __('Админ') }}</h2>
                        </div>
                    </div>
                @endif
            @endif
        {{-- Если пользователь не вошел --}}
        @else
            <div class="mt-10 flex flex-col md:flex-row w-full md:justify-between relative">
                <h2 id="prices-title" class="mb-10 md:mb-0">{{ __('Prices') }}</h2>
                <div class="flex flex-row justify-between w-full md:w-[70%] xl:w-[60%] p-4 bg-card_bg/75 rounded-xl">
                    <form action="{{ route('storePrice', strtolower($game->name)) }}" method="post" class="flex w-full sm:justify-between flex-col sm:flex-row">
                        @csrf
                        <div class="">
                            <div class="flex flex-col gap-y-6 sm:gap-y-0 sm:flex-row items-center mb-4">
                                <h3>{{ __('Total price:') }}</h3>
                                <h3 id="finalyPrice" class="flex items-center font-semibold leading-none tracking-wide bg-[#419253] p-2 rounded-xl ml-2 select-none">0$</h3>
                            </div>
                            @foreach ($prices as $price)
                                <div class="flex flex-row w-min items-center tooltip tooltip-right" data-tip="login to choose options">
                                    <input disabled type="checkbox" name="{{ $price->name }}" id="{{ $price->name }}" />
                                    <label class="label cursor-pointer w-min" for="{{ $price->name }}">
                                        <span class="label-text whitespace-nowrap leading-none ml-2 text-subwhite text-base">
                                            {{ $price->name }}
                                        </span>
                                        <span class="label-text whitespace-nowrap leading-none ml-2 text-white text-base">
                                            {{ $price->price . '$' }}
                                        </span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="w-full sm:w-min flex items-end">
                            <a href="{{ route('login') }}" class="py-3 sm:whitespace-nowrap px-10 w-full mt-3 sm:mt-0 text-white text-[1.7rem] font-semibold rounded-xl ring-main ring-2 cursor-pointer ease-out duration-200 hover:bg-main hover:text-dark">{{ __('Login to play') }}</a>
                        </div>
                    </form>
                </div>
            </div>
            <x-elems.separator class="my-10" />
        @endif

{{-- info section --}}
        <div class="flex flex-col md:flex-row w-full mt-10 md:justify-between relative">
            <h2 id="info-title" class="mb-10 md:mb-0">{{ __('Info') }}</h2>
            <x-page.block tabindex="0" onclick="createInfoSquare()" onblur="removeInfoSquare()" id="infoBlock">
                <h3 class="p-4 text-white">{{ $infos->title }}</h3>
                <p class="p-4 whitespace-pre-line text-white font-light">{{ $infos->text }}</p>
            </x-page.block>
            <div class="bg-main absolute right-0 bottom-0 w-0 h-0 rounded-xl z-0 ease-out duration-500" id="infoSquare"></div>
        </div>

{{-- rules section --}}
        <x-elems.separator class="my-10" />
        <div class="flex flex-col md:flex-row w-full md:justify-between relative">
            <h2 id="rules-title" class="mb-10 md:mb-0">{{ __('Rules') }}</h2>
            <x-page.block tabindex="0" id="rulesBlock" onclick="createRulesSquare()" onblur="removeRulesSquare()">
                @foreach ($rules as $rule)
                    @if ($loop->index < 1)
                        <h3 class="p-4 flex flex-col text-white">{{ $rule->title }}<p class="whitespace-pre-line mt-4 text-white font-light">{{ $rule->text }}</p></h3>
                    @else
                    <div>
                        <h3 class="p-4 text-white">{{ $rule->title }}</h3>
                        <p class="p-4 whitespace-pre-line text-white font-light">{{ $rule->text }}</p>
                    </div>
                    @endif
                @endforeach
            </x-page.block>
            <div class="bg-main absolute right-0 bottom-0 w-0 h-0 rounded-xl z-0 ease-out duration-500" id="rulesSquare"></div>
        </div>
    </main>
@endsection
