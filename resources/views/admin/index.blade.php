@extends('layouts.base')

@section('content')
    <main class="grow mt-12">
        <div class="w-full grid grid-cols-1 grid-rows-3 lg:grid-cols-2 xl:grid-cols-3 lg:grid-rows-1 gap-6">

{{-- nearby events card --}}
            <x-admin.block class="lg:col-span-2 xl:col-span-1 grow h-full px-6 pb-6">
                <h3 class="my-6 text-2xl font-semibold lg:font-medium lg:text-3xl">
                    {{ __('Nearby events') }}
                </h3>
                @if (count($nearbyEventsData) === 0)
                    <div class="flex flex-row w-full mt-6 bg-dark/50 py-10 px-6 rounded-xl">
                        <b class="leading-none select-none">
                            {{ __('There are no games here') }}
                        </b>
                    </div>
                @else
                    @foreach ($nearbyEventsData as $event)
                        <a href="{{ route('game', strtolower($event->game_name)) }}" class="grid grid-cols-1 gap-y-4 lg:grid-cols-3 w-full justify-between mt-6 bg-dark/50 p-5 rounded-xl ease-out duration-100 hover:bg-dark">
                            <b class="leading-none text-2xl lg:text-base lg:leading-none select-none">
                                {{ $event->game_name }}
                            </b>
                            <div class="flex flex-row">
                                <b class="mr-3 leading-none select-none">
                                    {{ $event->count_player }}
                                </b>
                                <p class="leading-none select-none">
                                    {{ __('players') }}
                                </p>
                            </div>
                            <b class="leading-none select-none">
                                {{ $event->game_date }}
                            </b>
                        </a>
                    @endforeach
                @endif
            </x-admin.block>

{{-- finished events card --}}
            <x-admin.block class="grow h-full px-6 pb-6">
                <h3 class="my-6 text-2xl font-semibold lg:font-medium lg:text-3xl">
                    {{ __('Finished events') }}
                </h3>
                @if (count($finishedEventsData) === 0)
                    <div class="flex flex-row w-full mt-6 bg-dark/50 py-10 px-6 rounded-xl">
                        <b class="leading-none select-none">
                            {{ __('No game is over yet') }}
                        </b>
                    </div>
                @else
                    @foreach ($finishedEventsData as $event)
                        <a href="{{ route('game', strtolower($event->game_name)) }}" class="grid grid-cols-1 gap-y-4 lg:grid-cols-3 w-full justify-between mt-6 bg-dark/50 p-5 rounded-xl ease-out duration-100 hover:bg-dark">
                            <b class="leading-none text-2xl lg:text-base lg:leading-none">
                                {{ $event->game_name }}
                            </b>
                            <div class="flex flex-row">
                                <b class="mr-3 leading-none">
                                    {{ $event->count_player }}
                                </b>
                                <p class="leading-none">
                                    {{ __('players') }}
                                </p>
                            </div>
                            <b class="leading-none">
                                {{ $event->game_date }}
                            </b>
                        </a>
                    @endforeach
                @endif
            </x-admin.block>

{{-- statistics card --}}
            <x-admin.block class="grow h-full px-6 pb-6">
                <h3 class="my-6 text-2xl font-semibold lg:font-medium lg:text-3xl">
                    {{ __('Statistics') }}
                </h3>
                <div class="flex flex-row w-full justify-between bg-dark/50 p-5 rounded-xl">
                    <b class="leading-none select-none">
                        {{ __('Users') }}
                    </b>
                    <p class="leading-none w-3">
                        {{ $statistic->count_users }}
                    </p>
                </div>
                <a href="{{ route('players') }}" class="flex flex-row w-full justify-between mt-3 bg-dark/50 p-5 rounded-xl ease-out duration-100 hover:bg-dark">
                    <b class="leading-none select-none">
                        {{ __('Players') }}
                    </b>
                    <p class="leading-none w-3">
                        {{ $statistic->count_players }}
                    </p>
                </a>
                <div class="flex flex-row w-full justify-between mt-3 bg-dark/50 p-5 rounded-xl">
                    <b class="leading-none select-none">
                        {{ __('Finished events') }}
                    </b>
                    <p class="leading-none w-3">
                        {{ $statistic->count_finished_games }}
                    </p>
                </div>
            </x-admin.block>
        </div>

        <div class="w-full flex justify-center">
            <h2 class="mt-20 mb-10">
                {{ __('Add new game') }}
            </h2>
        </div>

        <form action="{{ route('create') }}" method="POST" class="flex flex-col xl:grid grid-cols-1 md:grid-cols-3 gap-6 w-full mx-auto">
            @csrf

{{-- card information --}}
            <div class="bg-card_bg px-6 pb-6 rounded-xl flex flex-col gap-y-6 w-full md:w-2/3 xl:w-full mx-auto">
                <h3 class="text-addictive my-6">
                    {{ __('Card information') }}
                </h3>
                <x-admin.input placeholder="Game name" type="text" name="name" />
                <x-admin.input placeholder="Game date" type="text" name="date" onblur="this.type = 'text'" onfocus="this.type = 'date'" />
                <x-admin.input placeholder="Game time" type="text" name="time" onblur="this.type = 'text'" onfocus="this.type = 'time'" />
                <x-admin.input placeholder="Polygon" type="text" name="polygon" />
            </div>

{{-- map links --}}
            <div class="bg-card_bg px-6 pb-6 rounded-xl flex flex-col gap-y-6 w-full md:w-2/3 xl:w-full mx-auto">
                <h3 class="text-addictive my-6">
                    {{ __('Links') }}
                </h3>
                <x-admin.input placeholder="Link Map Iframe" type="text" name="linkForIframe" />
                <x-admin.input placeholder="Link Map Google" type="text" name="linkForGoogle" />
            </div>

{{-- game information --}}
            <div class="bg-card_bg px-6 pb-6 rounded-xl flex flex-col gap-y-6 w-full md:w-2/3 xl:w-full mx-auto">
                <h3 class="text-addictive my-6">
                    {{ __('Game information') }}
                </h3>
                <x-admin.input min="1" max="3" type="number" placeholder="Levels" name="levels" />
                <x-admin.input placeholder="Title" type="text" name="title" />
                <x-elems.textarea placeholder="Text" name="text" />
            </div>

{{-- game prices --}}
            <div class="bg-card_bg px-6 pb-6 rounded-xl flex flex-col justify-between w-full md:w-2/3 xl:w-full mx-auto">
                <div>
                    <h3 class="text-addictive my-6">
                        {{ __('Game prices') }}
                    </h3>
                    <div class="flex flex-col gap-y-6">
                        <h3>{{ __('Prices:') }}</h3>
                        <div class="flex flex-col gap-y-6 pricesBlock">
                            <x-admin.input placeholder="Service name" type="text" name="pricesTitle" />
                            <x-admin.input placeholder="Price" type="number" name="pricesText" />
                        </div>
                        <div id="pricesAdded" class="hidden"></div>
                        <input id="pricesCount" type="number" class="hidden" value="1" name="pricesCount"/>
                    </div>
                </div>
                <div class="flex flex-col items-center md:flex-row md:justify-between w-full mt-6 mx-auto">
                    <div class="md:place-self-end hover:text-green flex items-center justify-center text-subwhite text-base font-medium cursor-pointer rounded-xl hover:bg-dark/50 duration-100 ease-out bg-dark py-3 w-44 xl:w-40" onclick="addPriceColumns()">
                        {{ 'Add' }}
                    </div>
                    <div class="md:place-self-start my-4 md:my-0 hover:text-red flex items-center justify-center text-subwhite text-base font-medium cursor-pointer rounded-xl hover:bg-dark/50 duration-100 ease-out bg-dark py-3 w-44 xl:w-40" onclick="removePriceColumns()">
                        {{ 'Remove' }}
                    </div>
                </div>
            </div>

{{-- game rules --}}
            <div class="bg-card_bg px-6 pb-6 rounded-xl flex flex-col justify-between gap-y-6 w-full md:w-2/3 xl:w-full mx-auto md:col-span-2">
                <div>
                    <h3 class="text-addictive my-6">
                        {{ __('Game rules') }}
                    </h3>
                    <div class="flex flex-col gap-y-6 rulesBlock">
                        <x-admin.input placeholder="Title" type="text" name="rulesTitle" />
                        <x-elems.textarea placeholder="Text" name="rulesText" />
                    </div>
                </div>
                <div id="rulesAdded" class="hidden"></div>
                <input id="rulesCount" type="number" class="hidden" value="1" name="rulesCount"/>
                <div class="flex flex-col items-center md:flex-row md:justify-between w-full mx-auto">
                    <div class="md:place-self-end hover:text-green flex items-center justify-center text-subwhite text-base font-medium cursor-pointer rounded-xl hover:bg-dark/50 duration-100 ease-out bg-dark py-3 w-44 xl:w-40" onclick="addRulesColumns()">
                        {{ 'Add' }}
                    </div>
                    <div class="md:place-self-start my-4 md:my-0 hover:text-red flex items-center justify-center text-subwhite text-base font-medium cursor-pointer rounded-xl hover:bg-dark/50 duration-100 ease-out bg-dark py-3 w-44 xl:w-40" onclick="removeRulesColumns()">
                        {{ 'Remove' }}
                    </div>
                </div>
            </div>

            <div class="col-span-3 py-4 mb-10 flex justify-center">
                <x-elems.button class="py-3" value="Create" />
            </div>
        </form>
    </main>
@endsection
