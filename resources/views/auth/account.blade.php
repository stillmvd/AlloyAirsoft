@extends('layouts.base')

@section('title', 'Account')

@section('content')

    <div class="mt-20 w-full flex justify-center">
        <div class="grid grid-cols-1 lg:grid-cols-2 justify-between gap-10">
            <div class="rounded-full sm:rounded-2xl bg-dark">
                <h2 class="text-3xl text-center sm:text-left sm:text-5xl p-6 rounded-2xl ease-out duration-100">
                    Newbie? Let's registrate
                </h2>
                <form id="regForm" action="{{ route('register_store') }}" method="POST" class="flex flex-col gap-4 w-full bg-card_bg p-6 rounded-2xl">
                    @csrf
                    <div class="flex relative flex-col">
                        <x-text.label id="email_label_log" class="z-10" for="emailPlayer">{{ __('Email') }}</x-text.label>
                        <x-elems.input id="input_email_log" class="bg-transparent h-16" type="text" name="emailPlayerForReg" value="{{ old('emailPlayer') }}"/>
                        @error('emailPlayer')
                            <b class="px-6 py-2 w-min absolute z-20 bottom-[-40%] right-[-10%] rounded-2xl bg-card_bg text-red font-medium flex flex-row items-center whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                </svg>
                                {{ $message }}
                            </b>
                        @enderror
                    </div>
                    <div class="flex relative flex-col">
                        <x-text.label id="password_label_log" class="z-10" for="password">{{ __('Password') }}</x-text.label>
                        <x-elems.input id="input_password_log" class="bg-transparent h-16" type="password" name="passwordForReg" value="{{ old('password') }}"/>
                        @error('password')
                            <b class="px-6 py-2 w-min absolute z-20 bottom-[-40%] left-[-10%] rounded-2xl bg-card_bg text-red font-medium flex flex-row items-center whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                </svg>
                                {{ $message }}
                            </b>
                        @enderror
                    </div>
                    <x-elems.button value="Registrate" class="mt-6 py-4 w-full z-20"/>
                </form>     
            </div>
            <div class="rounded-full sm:rounded-2xl bg-dark flex flex-col justify-between">
                <h2 class="text-3xl text-center sm:text-left sm:text-5xl p-6 rounded-2xl ease-out duration-100">
                    Login
                </h2>
                <form id="logForm" action="{{ route('login_store') }}" method="POST" class="flex flex-col gap-4 w-full bg-card_bg p-6 rounded-2xl">
                    @csrf
                    <div class="flex relative flex-col">
                        <x-text.label id="email_label_reg" class="z-10" for="emailPlayer">{{ __('Email') }}</x-text.label>
                        <x-elems.input id="input_email_reg" class="bg-transparent h-16" type="text" name="emailPlayerForLog" value="{{ old('emailPlayer') }}"/>
                        @error('emailPlayer')
                            <b class="px-6 py-2 w-min absolute z-20 bottom-[-40%] right-[-10%] rounded-2xl bg-card_bg text-red font-medium flex flex-row items-center whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                </svg>
                                {{ $message }}
                            </b>
                        @enderror
                    </div>
                    <div class="flex relative flex-col">
                        <x-text.label id="password_label_reg" class="z-10" for="password">{{ __('Password') }}</x-text.label>
                        <x-elems.input id="input_password_reg" class="bg-transparent h-16" type="password" name="passwordForLog" value="{{ old('password') }}"/>
                        @error('password')
                            <b class="px-6 py-2 w-min absolute z-20 bottom-[-40%] left-[-10%] rounded-2xl bg-card_bg text-red font-medium flex flex-row items-center whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                </svg>
                                {{ $message }}
                            </b>
                        @enderror
                    </div>
                    <x-elems.button value="Login" class="mt-6 py-4 w-full z-20"/>
                </form>
            </div>
        </div>
    </div>

@endsection
