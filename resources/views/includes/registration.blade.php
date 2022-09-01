<x-text.title class="my-10 text-center">
    {{ __('Registration') }}
</x-text.title>
<x-elems.regform>
    <div class="flex relative flex-col">
        <x-text.label id="name_label" for="name">{{ __('Name') }}</x-text.label>
        <x-elems.input type="text" name="name" id="input_name" value="{{ old('name') }}"/>
        @error('name')
            <b class="px-6 py-2 w-min absolute z-20 bottom-[-40%] left-[-10%] rounded-2xl bg-card_bg text-red font-medium flex flex-row items-center whitespace-nowrap tablet-xl:whitespace-nowrap zero:whitespace-normal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
                {{ $message }}
            </b>
        @enderror
    </div>
    <div class="flex relative flex-col">
        <x-text.label id="surname_label" for="surname">{{ __('Surname') }}</x-text.label>
        <x-elems.input type="text" name="surname" id="input_surname" value="{{ old('surname') }}"/>
        @error('surname')
            <b class="px-6 py-2 w-min absolute z-20 bottom-[-40%] right-[-10%] rounded-2xl bg-card_bg text-red font-medium flex flex-row items-center whitespace-nowrap tablet-xl:whitespace-nowrap zero:whitespace-normal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
                {{ $message }}
            </b>
        @enderror
    </div>
    <div class="flex relative flex-col">
        <x-text.label id="callsign_label" for="callsign">{{ __('Call sign') }}</x-text.label>
        <x-elems.input type="text" name="callsign" id="input_callsign" value="{{ old('callsign') }}"/>
        @error('callsign')
            <b class="px-6 py-2 w-min absolute z-20 bottom-[-40%] left-[-10%] rounded-2xl bg-card_bg text-red font-medium flex flex-row items-center whitespace-nowrap tablet-xl:whitespace-nowrap zero:whitespace-normal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
                {{ $message }}
            </b>
        @enderror
    </div>
    <div class="flex relative flex-col">
        <x-text.label id="email_label" for="email">{{ __('Email') }}</x-text.label>
        <x-elems.input type="text" name="emailPlayer" id="input_email" value="{{ old('emailPlayer') }}"/>
        @error('emailPlayer')
            <b class="px-6 py-2 w-min absolute z-20 bottom-[-40%] right-[-10%] rounded-2xl bg-card_bg text-red font-medium flex flex-row items-center whitespace-nowrap tablet-xl:whitespace-nowrap zero:whitespace-normal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
                {{ $message }}
            </b>
        @enderror
    </div>
    <div class="flex relative flex-col">
        <x-text.label id="phone_label" for="phone">{{ __('Phone') }}</x-text.label>
        <x-elems.input type="text" name="phone" id="input_phone" value="{{ old('phone') }}"/>
        @error('phone')
            <b class="px-6 py-2 w-min absolute z-20 bottom-[-40%] left-[-10%] rounded-2xl bg-card_bg text-red font-medium flex flex-row items-center whitespace-nowrap tablet-xl:whitespace-nowrap zero:whitespace-normal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
                {{ $message }}
            </b>
        @enderror
    </div>
    <div class="flex relative flex-col">
        <x-text.label id="team_label" for="team">{{ __('Team') }}</x-text.label>
        <x-elems.select name="team" id="input_team" :teams="$teams" :teams_count="$teams_count" value="{{ old('team') }}"/>
        @error('team')
            <b class="px-6 py-2 w-min absolute z-20 bottom-[-40%] right-[-10%] rounded-2xl bg-card_bg text-red font-medium flex flex-row items-center whitespace-nowrap tablet-xl:whitespace-nowrap zero:whitespace-normal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
                {{ $message }}
            </b>
        @enderror
    </div>
    <x-elems.button value="Play" class="w-full z-20"/>
</x-elems.regform>
