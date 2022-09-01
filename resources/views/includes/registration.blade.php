<x-text.title class="my-10 text-center">
    {{ __('Registration') }}
</x-text.title>
<x-elems.regform action="{{ route('store_players', $game->id) }}">
    <div class="flex relative">
        <x-text.label id="name_label" for="name">{{ __('Name') }}</x-text.label>
        <x-elems.input type="text" name="name" id="input_name" value="{{ old('name') }}"/>
        @error('name')
            <div class="flex flex-row items-center pt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="red" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
                <p class="pl-2 text-red">
                    {{ $message }}
                </p>
            </div>
        @enderror
    </div>
    <div class="flex relative">
        <x-text.label id="surname_label" for="surname">{{ __('Surname') }}</x-text.label>
        <x-elems.input type="text" name="surname" id="input_surname" value="{{ old('surname') }}"/>
        @error('surname')
            <div class="flex flex-row items-center pt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="red" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
                <p class="pl-2 text-red">
                    {{ $message }}
                </p>
            </div>
        @enderror
    </div>
    <div class="flex relative">
        <x-text.label id="callsign_label" for="callsign">{{ __('Call sign') }}</x-text.label>
        <x-elems.input type="text" name="callsign" id="input_callsign" value="{{ old('callsign') }}"/>
        @error('callsign')
            <div class="flex flex-row items-center pt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="red" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
                <p class="pl-2 text-red">
                    {{ $message }}
                </p>
            </div>
        @enderror
    </div>
    <div class="flex relative">
        <x-text.label id="email_label" for="email">{{ __('Email') }}</x-text.label>
        <x-elems.input type="text" name="emailPlayer" id="input_email" value="{{ old('emailPlayer') }}"/>
        @error('emailPlayer')
            <div class="flex flex-row items-center pt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="red" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
                <p class="pl-2 text-red">
                    {{ $message }}
                </p>
            </div>
        @enderror
    </div>
    <div class="flex relative">
        <x-text.label id="phone_label" for="phone">{{ __('Phone') }}</x-text.label>
        <x-elems.input type="text" name="phone" id="input_phone" value="{{ old('phone') }}"/>
        @error('phone')
            <div class="flex flex-row items-center pt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="red" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
                <p class="pl-2 text-red">
                    {{ $message }}
                </p>
            </div>
        @enderror
    </div>
    <div class="flex relative">
        <x-text.label id="team_label" for="team">{{ __('Team') }}</x-text.label>
        <x-elems.select name="team" id="input_team" :teams="$teams" :teams_count="$teams_count" value="{{ old('team') }}"/>
        @error('team')
            <div class="flex flex-row items-center pt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="red" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
                <p class="pl-2 text-red">
                    {{ $message }}
                </p>
            </div>
        @enderror
    </div>
    <x-elems.button value="Play" class="w-full"/>
</x-elems.regform>
