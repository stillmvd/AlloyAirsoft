@extends('layouts.base')

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <p class="hidden" id="first_cord">{{ $first_cord }}</p>
    <p class="hidden" id="second_cord">{{ $second_cord }}</p>

    <div class="grid grid-cols-3 auto-cols-max my-10">
        <x-text.title class="w-full text-white font-light flex items-end pb-4">
            {{ __($game->name) }}
        </x-text.title>
        <x-text.gamedate class="w-full items-end justify-center text-center font-light" :game='$game'/>
        <x-text.gametime class="w-full items-end justify-end text-end font-light" :game='$game'/>
    </div>

    <div class="relative group w-full h-400px overflow-hidden rounded-3xl ring-2 ring-amber-500/75">
        <x-map/>
    </div>

    <div class="flex flex-col mt-20">

        <div class="flex flex-row justify-between w-full">
            <x-text.title>
                {{ __('Info') }}
            </x-text.title>
            <div class="flex flex-row justify-end w-[60%]">
                <div class="text-left flex flex-row items-start justify-between">
                    <x-text.paragraph class="text-[#CACACA] leading-8 w-[90%]">
                        {{ __($game->description) }}
                    </x-text.paragraph>
                    <img src="{{ asset('image/arrows.svg') }}" alt="arrows" class="cursor-pointer">
                </div>
            </div>
        </div>
        <div class="h-[2px] mt-10 mb-10 w-full bg-[#242424]"></div>

        <div class="flex flex-row justify-between w-full">
            <x-text.title>
                {{ __('Rules') }}
            </x-text.title>
            <div class="flex flex-row justify-end w-[60%]">
                <div class="text-left flex flex-row items-start justify-between">
                    <x-text.paragraph class="text-[#CACACA] leading-8 w-[90%]">
                        Groups
                        - There will be no team in the usual environment, only your group and an unknown number of other similar groups
                        - The group can be any size from 2 to 11 people
                        - There are no restrictions on equipment and camouflage for a group, the group gathers according to its destination

                        Start of the game and interaction with the hosts
                        - Registration takes place at the parking lot, after which the group is allowed to move to their spawn point
                        - All players in a single group need to add a host in Messenger to receive tasks directly on the players' mobile devices
                        - To contact the host, you can use both mobile devices and a pre-installed radio wave
                        - The conditions for completing the task will be transmitted to the players using the messenger, until then the conditions of any task will be unknown

                        Injuries
                        - The game has a wound system. Those. after the first hit anywhere, the player is considered wounded and must sit on the ground without a death bandage.
                        - Injured players are allowed to call their own for help.
                        - A wounded player can be lifted by bandaging any limb.
                        - The bandage can be removed 60 minutes after application.

                        Kill
                        - The player is considered dead after a second hit in the status of wounded or with a bandage
                        - The player is considered dead after being attacked with a melee weapon in any case.
                    </x-text.paragraph>
                    <img src="{{ asset('image/arrows.svg') }}" alt="arrows" class="cursor-pointer">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('includes.footer')
@endsection
