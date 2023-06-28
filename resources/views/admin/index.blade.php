@extends('layouts.base')

@section('content')
    <main class="grow mt-12">
        <div class="w-full grid grid-cols-1 grid-rows-3 lg:grid-cols-2 xl:grid-cols-3 lg:grid-rows-1 gap-6">

{{-- nearby events card --}}
            <x-admin.block class="lg:col-span-2 xl:col-span-1 grow h-full px-6 pb-6">
                <h3 class="my-6 text-2xl font-semibold lg:font-medium lg:text-3xl">
                    {{ __('Nearby events') }}
                </h3>
                @if (1 > $games->where('finished', 0)->count())
                    <div class="flex flex-row w-full mt-6 bg-dark/50 py-10 px-6 rounded-xl">
                        <b class="leading-none select-none">
                            {{ __('There are no games here') }}
                        </b>
                    </div>
                @else
                    @foreach ($games as $game)
                        @if (0 == $game->finished)
                            <a href="{{ route('game', strtolower($game->name)) }}" class="grid grid-cols-1 gap-y-4 lg:grid-cols-3 w-full justify-between mt-6 bg-dark/50 p-5 rounded-xl ease-out duration-100 hover:bg-dark">
                                <b class="leading-none text-2xl lg:text-base lg:leading-none select-none">
                                    {{ $game->name }}
                                </b>
                                <div class="flex flex-row">
                                    <b class="mr-3 leading-none select-none">
                                        {{ $game_players->where('game_id', $game->id)->count() }}
                                    </b>
                                    <p class="leading-none select-none">
                                        {{ __('players') }}
                                    </p>
                                </div>
                                <b class="leading-none select-none">
                                    {{ $game->date }}
                                </b>
                            </a>
                        @endif
                    @endforeach
                @endif
            </x-admin.block>

{{-- finished events card --}}
            <x-admin.block class="grow h-full px-6 pb-6">
                <h3 class="my-6 text-2xl font-semibold lg:font-medium lg:text-3xl">
                    {{ __('Finished events') }}
                </h3>
                @if (1 > $games->where('finished', 1)->count())
                    <div class="flex flex-row w-full mt-6 bg-dark/50 py-10 px-6 rounded-xl">
                        <b class="leading-none select-none">
                            {{ __('No game is over yet') }}
                        </b>
                    </div>
                @else
                    @foreach ($games as $game)
                        @if (1 == $game->finished)
                            <a href="{{ route('game', strtolower($game->name)) }}" class="grid grid-cols-1 gap-y-4 lg:grid-cols-3 w-full justify-between mt-6 bg-dark/50 p-5 rounded-xl ease-out duration-100 hover:bg-dark">
                                <b class="leading-none text-2xl lg:text-base lg:leading-none">
                                    {{ $game->name }}
                                </b>
                                <div class="flex flex-row">
                                    <b class="mr-3 leading-none">
                                        {{ $players->where('id', $game->id)->count() }}
                                    </b>
                                    <p class="leading-none">
                                        {{ __('players') }}
                                    </p>
                                </div>
                                <b class="leading-none">
                                    {{ $game->date }}
                                </b>
                            </a>
                        @endif
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
                        {{ $users->count() }}
                    </p>
                </div>
                <a href="{{ route('players') }}" class="flex flex-row w-full justify-between mt-3 bg-dark/50 p-5 rounded-xl ease-out duration-100 hover:bg-dark">
                    <b class="leading-none select-none">
                        {{ __('Players') }}
                    </b>
                    <p class="leading-none w-3">
                        {{ $players->count() }}
                    </p>
                </a>
                <div class="flex flex-row w-full justify-between mt-3 bg-dark/50 p-5 rounded-xl">
                    <b class="leading-none select-none">
                        {{ __('Finished events') }}
                    </b>
                    <p class="leading-none w-3">
                        {{ $games->where('finished', '1')->count() }}
                    </p>
                </div>
            </x-admin.block>
        </div>

        <div class="w-full flex justify-center">
            <h2 class="mt-20 mb-10">
                {{ __('Add new game') }}
            </h2>
        </div>

        <form action="{{ route('create') }}" method="POST" class="flex flex-col">
            @csrf

        </form>
    </main>
    @vite('resources/js/Admin/CreateGame/js-react/index.jsx')
@endsection
