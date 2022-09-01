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
            <form action="" method="POST" class="flex flex-col mt-10 gap-y-6 items-center">
                @csrf
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Phone') }}
                    </p>
                    <x-admin.input class="tel" class="w-[70%]" />
                </div>
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Email') }}
                    </p>
                    <x-admin.input type="email" class="w-[70%]" />
                </div>
                <x-elems.button class="w-full py-1" value="Save" />
            </form>
        </x-admin.block>
    
        <x-admin.block class="p-6">
            <h3>
                {{ __('Player information') }}
            </h3>
            <form action="" method="POST" class="flex flex-col mt-10 gap-y-6 items-center">
                @csrf
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Name') }}
                    </p>
                    <x-admin.input class="tel" class="w-[70%]" />
                </div>
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Surname') }}
                    </p>
                    <x-admin.input type="email" class="w-[70%]" />
                </div>
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Callsign') }}
                    </p>
                    <x-admin.input class="tel" class="w-[70%]" />
                </div>
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Email') }}
                    </p>
                    <x-admin.input type="email" class="w-[70%]" />
                </div>
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Phone') }}
                    </p>
                    <x-admin.input class="tel" class="w-[70%]" />
                </div>
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Team') }}
                    </p>
                    <select class="w-[70%] px-5 py-3 box-border rounded-xl ring-2 ring-subwhite bg-card_bg font-medium text-white text-[1.1rem] appearance-none focus:outline-none">
                        <option selected disabled></option>
                        @for ($i = 0; $i < $teams_count; $i++)
                            <option value="{{ $i+1 }}">{{ $teams[$i]->name }}</option>
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
            <form action="" method="POST" class="flex flex-col mt-10 gap-y-6 items-center">
                @csrf
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Login') }}
                    </p>
                    <x-admin.input class="text" class="w-[70%]" />
                </div>
                <div class="flex flex-row items-center w-full justify-between">
                    <p class="mr-10">
                        {{ __('Password') }}
                    </p>
                    <x-admin.input type="password" class="w-[70%]" />
                </div>
                <x-elems.button class="w-full py-1" value="Save" />
            </form>
        </x-admin.block>
    </div>

@endsection