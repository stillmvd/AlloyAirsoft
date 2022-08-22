<x-text.title class="m-auto my-10">
    {{ __('Registration') }}
</x-text.title>
<x-elems.regform>
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
</x-elems.regform>
