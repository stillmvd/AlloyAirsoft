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

{{--        <form action="{{ route('create') }}" method="POST" class="flex flex-col">--}}
{{--            @csrf--}}
                <div id="game-card"></div>
{{--        </form>--}}
    </main>
    @vite('resources/js/Admin/CreateGame/js-react/index.jsx')
@endsection
