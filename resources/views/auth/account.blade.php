@extends('layouts.base')

@section('title', 'Account')

@section('content')

    <div class="mt-20 w-full flex justify-center">
        <div class="flex flex-row justify-between gap-10">
            <div class="relative">
                <h2 class="bg-dark/50 w-[600px] p-6 rounded-2xl ease-out duration-100">
                    Newbie? Let's registrate
<<<<<<< HEAD
        </h2>
                <form action="{{ route('register_store') }}" method="POST" class="flex -bottom-[230%] flex-col gap-4 mt-10 absolute z-0 w-[80%] left-0 right-0 m-auto bg-card_bg p-6 rounded-2xl">
                    @csrf
                    <div class="flex relative flex-col">
                        <x-text.label class="z-10" id="email_label" for="emailPlayer">{{ __('Email') }}</x-text.label>
                        <x-elems.input class="bg-transparent h-16" type="text" name="emailPlayerForReg" id="input_email" value="{{ old('emailPlayer') }}"/>
=======
                </h2>
                <form id="regForm" action="{{ route('register_store') }}" method="POST" class="flex -bottom-[230%] flex-col gap-4 mt-10 absolute z-0 w-[80%] left-0 right-0 m-auto bg-card_bg p-6 rounded-2xl">
                    @csrf
                    <div class="flex relative flex-col">
                        <x-text.label id="email_label_log" class="z-10" for="emailPlayer">{{ __('Email') }}</x-text.label>
                        <x-elems.input id="input_email_log" class="bg-transparent h-16" type="text" name="emailPlayer" value="{{ old('emailPlayer') }}"/>
>>>>>>> f1bfc2c458be5ea26940a5ffc77ed0958cc29530
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
<<<<<<< HEAD
                        <x-text.label class="z-10" id="password_label" for="password">{{ __('Password') }}</x-text.label>
                        <x-elems.input class="bg-transparent h-16" type="password" name="passwordForReg" id="input_password" value="{{ old('password') }}"/>
=======
                        <x-text.label id="password_label_log" class="z-10" for="password">{{ __('Password') }}</x-text.label>
                        <x-elems.input id="input_password_log" class="bg-transparent h-16" type="text" name="password" value="{{ old('password') }}"/>
>>>>>>> f1bfc2c458be5ea26940a5ffc77ed0958cc29530
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
            <div class="relative bg-dark/50 rounded-2xl hover:bg-dark">
                <h2 class="w-[600px] p-6 ease-out duration-100">
                    Login
                </h2>
                <form id="logForm" action="{{ route('login_store') }}" method="POST" class="flex -bottom-[230%] flex-col gap-4 mt-10 absolute z-0 w-[80%] left-0 right-0 m-auto bg-card_bg p-6 rounded-2xl">
                    @csrf
                    <div class="flex relative flex-col">
<<<<<<< HEAD
                        <x-text.label class="z-10" id="email_label2" for="emailPlayer">{{ __('Email') }}</x-text.label>
                        <x-elems.input class="bg-transparent h-16" type="text" name="emailPlayerForLog" id="input_email2" value="{{ old('emailPlayer') }}"/>
=======
                        <x-text.label id="email_label_reg" class="z-10" for="emailPlayer">{{ __('Email') }}</x-text.label>
                        <x-elems.input id="input_email_reg" class="bg-transparent h-16" type="text" name="emailPlayer" value="{{ old('emailPlayer') }}"/>
>>>>>>> f1bfc2c458be5ea26940a5ffc77ed0958cc29530
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
<<<<<<< HEAD
                        <x-text.label class="z-10" id="password_label2" for="password">{{ __('Password') }}</x-text.label>
                        <x-elems.input class="bg-transparent h-16" type="password" name="passwordForLog" id="input_password2" value="{{ old('password') }}"/>
=======
                        <x-text.label id="password_label_reg" class="z-10" for="password">{{ __('Password') }}</x-text.label>
                        <x-elems.input id="input_password_reg" class="bg-transparent h-16" type="text" name="password" value="{{ old('password') }}"/>
>>>>>>> f1bfc2c458be5ea26940a5ffc77ed0958cc29530
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
