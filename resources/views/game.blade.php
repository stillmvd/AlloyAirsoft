@extends('layouts.base')

@section('content')
    <x-page.maininfo class="items-end py-9">
        <x-text.title class="h-min text-white font-normal">
            {{ __($game->name) }}
        </x-text.title>
        <x-text.gamedate :game='$game' class="" />
        <x-text.gametime :game='$game' class="" />
    </x-page.maininfo>
    
    <x-text.cords first_cord='{{ $game->first_cord }}' second_cord='{{ $game->second_cord }}' />
    <x-gamecard.body>
        <x-elems.map id="map" />
    </x-gamecard.body>

    <x-page.gameinfo>
        <x-text.title>
            {{ __('Info') }}
        </x-text.title>
        <x-page.block class="flex-col w-[60%] h-[160px] ease-out duration-200 overflow-hidden" id="info-block">
            <x-text.subtitle>
                {{ __('Mercenaries!') }}
            </x-text.subtitle>
            <x-text.paragraph class="w-[70%]" id="info-text">
                Our company is extremely interested in renting your services for identification signals on territory hostile to us with a large group of unidentified armed individuals involved in activities and for information about which we of course we will pay you.
                
                “Colleagues”, do with them at your own discretion, no fines or rewards for You don't have to remove them. To clarify one point, we cannot transfer a group of more than 11 people, so Choose your best fighters and equip as you see fit. Take with you everything you need, because due to high risks we are not ready to transfer supplies to this territory.
            </x-text.paragraph>
            <x-elems.arrow onclick="showInfoBlock()" id="info-arrow" />
        </x-page.block>
    </x-page.gameinfo>

    <x-elems.separator />

    <x-page.gamerules>
        <x-text.title>
            {{ __('Rules') }}
        </x-text.title>
        <x-page.block class="flex-col w-[60%] h-[180px] ease-out duration-200 overflow-hidden" id="rules-block">
            <x-text.subtitle>
                {{ __('1. Groups') }}
            </x-text.subtitle>
            <x-text.paragraph class="w-[70%]">
                - There will be no team in the usual environment, only your group and an unknown number of other similar groups;
                - The group can be any size from 2 to 11 people;
                - There are no restrictions on equipment and camouflage for a group, the group gathers according to its destination.
            </x-text.paragraph>
            <x-text.subtitle class="mt-10">
                {{ __('2. Start of the game and interaction with the hosts') }}
            </x-text.subtitle>
            <x-text.paragraph class="w-[70%]">
                - Registration takes place at the parking lot, after which the group is allowed to move to their spawn point;
                - All players in a single group need to add a host in Messenger to receive tasks directly on the players' mobile devices;
                - To contact the host, you can use both mobile devices and a pre-installed radio wave;
                - The conditions for completing the task will be transmitted to the players using the messenger, until then the conditions of any task will be unknown.
            </x-text.paragraph>
            <x-text.subtitle class="mt-10">
                {{ __('3. Injuries') }}
            </x-text.subtitle>
            <x-text.paragraph class="w-[70%]">
                - The game has a wound system. Those. after the first hit anywhere, the player is considered wounded and must sit on the ground without a death bandage;
                - Injured players are allowed to call their own for help;
                - A wounded player can be lifted by bandaging any limb;
                - The bandage can be removed 60 minutes after application.
            </x-text.paragraph>
            <x-text.subtitle class="mt-10">
                {{ __('4. Kill') }}
            </x-text.subtitle>
            <x-text.paragraph class="w-[70%]">
                - The player is considered dead after a second hit in the status of wounded or with a bandage;
                - The player is considered dead after being attacked with a melee weapon in any case.
            </x-text.paragraph>
            <x-text.subtitle class="mt-10">
                {{ __('5. Game bans') }}
            </x-text.subtitle>
            <x-text.paragraph class="w-[70%]">
                - It is forbidden to replenish at the place of arrival at the game / parking lot. Anyone who replenishes / changes equipment automatically disqualifies the entire team;
                - Act outside the boundaries of Canadian criminal law;
                - Using any pyrotechnics (Grenades, Flares).
            </x-text.paragraph>
            <x-elems.arrow onclick="showRulesBlock()" id="rules-arrow" />
        </x-page.block>
    </x-page.gamerules>

    <x-elems.separator />

    @include('includes.registration')
@endsection