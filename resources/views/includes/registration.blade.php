<x-text.title class="text-center my-10">
    {{ __('Registration') }}
</x-text.title>
<form action="{{ route('store_players', $game->id) }}" method="post" class="m-auto
    desktop-xl:w-[80%]
    desktop:w-[80%] 
    laptop:w-[80%] 
    tablet-xl:w-[100%] 
    tablet:w-[100%] 
    phone:w-[100%]
    zero:w-[100%]
    ">
    @csrf
    <div class="grid grid-cols-2 grid-rows-4
    tablet-xl:grid-cols-2 tablet-xl:grid-rows-4
    tablet:grid-cols-1 tablet:grid-rows-7 tablet:gap-6
    phone:grid-cols-1 phone:grid-rows-7 phone:gap-6
    zero:grid-cols-1 zero:grid-rows-7 zero:gap-6
    ">
        <div class="flex relative">
            <x-text.label id="name_label" for="name">{{ __('Name') }}</x-text.label>
            <x-elems.input type="text" name="name" id="input_name"/>
        </div>
        <div class="flex relative">
            <x-text.label id="surname_label" for="surname">{{ __('Surname') }}</x-text.label>
            <x-elems.input type="text" name="surname" id="input_surname"/>
        </div>
        <div class="flex relative">
            <x-text.label id="callsign_label" for="callsign">{{ __('Call sign') }}</x-text.label>
            <x-elems.input type="text" name="callsign" id="input_callsign"/>
        </div>
        <div class="flex relative">
            <x-text.label id="email_label" for="email">{{ __('Email') }}</x-text.label>
            <x-elems.input type="email" name="email" id="input_email"/>
        </div>
        <div class="flex relative">
            <x-text.label id="phone_label" for="phone">{{ __('Phone') }}</x-text.label>
            <x-elems.input type="text" name="phone" id="input_phone"/>
        </div>
        <div class="flex relative">
            <x-text.label id="team_label" for="team">{{ __('Team') }}</x-text.label>
            <x-elems.select name="team" id="input_team" :teams="$teams" :teams_count="$teams_count"/>
        </div>
        <x-elems.button value="Play" class="w-full"/>
    </div>
</form>
