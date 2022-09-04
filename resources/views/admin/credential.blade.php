@extends('layouts.base')

@section('content')
    <div class="flex justify-center">
        <h1>
            {{ __('Change your credential') }}
        </h1>
    </div>

    <div class="grid grid-cols-3 grid-rows-1 gap-6">
        <x-admin.block class="p-6">
            <h3>
                {{ __('Contact information') }}
            </h3>
            <form action="{{ route('contactInformation') }}" method="POST" class="flex flex-col mt-10 gap-y-6 items-center">
                @csrf
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Phone') }}
                    </p>
                    <x-admin.input value="{{ $phone }}" name="phone" class="w-[70%]" required />
                </div>
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Email') }}
                    </p>
                    <x-admin.input value="{{ $email }}" name="email" type="email" class="w-[70%]" required />
                </div>
                <x-elems.button class="w-full py-1" value="Save" />
            </form>
        </x-admin.block>

        <x-admin.block class="p-6">
            <h3>
                {{ __('Player information') }}
            </h3>
            <form action="{{ route('playerInformation') }}" method="POST" class="flex flex-col mt-10 gap-y-6 items-center">
                @csrf
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Name') }}
                    </p>
                    <x-admin.input name="name" value="{{ $admin->name }}" class="w-[70%]" />
                </div>
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Surname') }}
                    </p>
                    <x-admin.input name="surname" value="{{ $admin->surname }}" type="text" class="w-[70%]" />
                </div>
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Callsign') }}
                    </p>
                    <x-admin.input name="callsign" value="{{ $admin->callsign }}" class="w-[70%]" />
                </div>
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Email') }}
                    </p>
                    <x-admin.input name="email" value="{{ $admin->emailPlayer }}" type="email" class="w-[70%]" />
                </div>
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Phone') }}
                    </p>
                    <x-admin.input name="phone" value="{{ $admin->phone }}" class="w-[70%]" />
                </div>
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Team') }}
                    </p>
                    <select name="team_id" class="w-[70%] px-5 py-3 box-border rounded-xl ring-2 ring-subwhite bg-card_bg font-medium text-white text-[1.1rem] appearance-none focus:outline-none">
                        @for ($i = 0; $i < $teams_count; $i++)
                            @if ($teams[$i]->id == $admin->team_id)
                                <option selected value="{{ $teams[$i]->id }}">{{ $teams[$i]->name }}</option>
                            @else
                                <option value="{{ $teams[$i]->id }}">{{ $teams[$i]->name }}</option>
                            @endif
                        @endfor
                    </select>
                </div>
                <x-elems.button class="w-full py-1" value="Save" />
            </form>
        </x-admin.block>

        <x-admin.block class="p-6">
            <h3>
                {{ __('Admin information') }}
            </h3>
            <form action="{{ route('adminInformation') }}" method="POST" class="flex flex-col mt-10 gap-y-6 items-center">
                @csrf
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Login') }}
                    </p>
                    <x-admin.input value="{{ $login }}" name="login" class="text" class="w-[70%]" />
                </div>
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Password') }}
                    </p>
                    <x-admin.input name="password" type="password" class="w-[70%]" />
                </div>
                <x-elems.button class="w-full py-1" value="Save" />
            </form>
        </x-admin.block>
    </div>

@endsection
