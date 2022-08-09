@extends('layouts.base')

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <p class="hidden" id="first_cord">{{ $first_cord }}</p>
    <p class="hidden" id="second_cord">{{ $second_cord }}</p>

    <div class="flex w-full justify-between items-center py-6">
        <x-text.title class="text-white">
            {{ __($game->name) }}
        </x-text.title>
        <x-text.gamedate :game='$game'/>
        <x-text.gametime :game='$game'/>
    </div>

    <div class="relative group w-full h-400px overflow-hidden rounded-3xl">
        <div id="map" class="h-[400px] w-full bg-[#303030]/25 scale-110"></div>
    </div>

    <div class="flex flex-col mt-[64px] mb-96">
        <div class="flex flex-row pb-[38px] border-b-[2px] border-[#242424]">
            <x-text.title class="pr-[28.13px]">
                {{ __('Info') }}
            </x-text.title>
            <div class="flex flex-row justify-end">
                <div class="w-[60%] text-left flex flex-row">
                    <x-text.paragraph class="text-[#CACACA] leading-8">
                        {{ __($game->description) }}
                    </x-text.paragraph>
                    <img src="{{ asset('image/arrows.svg') }}" alt="arrows" class="pl-5 pt-4">
                </div>
            </div>
        </div>
        <div class="flex flex-row pt-[38px]">
            <x-text.title class="w-[100px]">
                {{ __('Rules') }}
            </x-text.title>
            <div class="flex flex-row justify-end">
                <div class="w-[60%] text-left flex flex-row">
                    <x-text.paragraph class="text-[#CACACA] leading-8">
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

        </div>
    </div>
@endsection
