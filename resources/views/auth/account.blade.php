@extends('layouts.base')

@section('title', 'Login')

@section('content')
    <main class="flex flex-col w-full items-start h-full grow justify-center">
        <div class="min-w-min 2xl:w-[30%] rounded-xl bg-card_bg px-4 py-10 sm:p-10 mx-auto">
            <h2 class="w-min mx-auto">
                {{ __('Welcome') }}
            </h2>
            <p class="mx-auto w-full text-center lg:text-left lg:w-min lg:whitespace-nowrap mt-3">
                {{ __('Log in to continue with AlloyAirsoft') }}
            </p>
            <form action="{{ route('login_store') }}" method="POST" class="flex flex-col gap-4 w-full my-8">
                @csrf
                <div class="flex relative flex-col">
                    <x-text.label id="label_email_log" class="z-10" for="emailPlayerForLog">{{ __('Email') }}</x-text.label>
                    <x-elems.input id="input_email_log" class="bg-transparent" tabindex="1" type="text" name="emailPlayerForLog" value="{{ old('emailPlayerForLog') }}"/>
                    @error('emailPlayerForLog')
                        <b class="px-6 py-2 w-min absolute z-30 -bottom-[40%] -right-[10%] rounded-2xl bg-dark text-red font-medium flex flex-row items-center whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                            </svg>
                            {{ $message }}
                        </b>
                    @enderror
                </div>
                <div class="flex relative flex-col">
                    <x-text.label id="label_password_log" class="z-10" for="passwordForLog">{{ __('Password') }}</x-text.label>
                    <x-elems.input id="input_password_log" class="bg-transparent" tabindex="2" type="password" name="passwordForLog" value="{{ old('passwordForLog') }}"/>
                    @error('passwordForLog')
                        <b class="px-6 py-2 w-min absolute z-30 -bottom-[40%] -right-[10%] rounded-2xl bg-dark text-red font-medium flex flex-row items-center whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                            </svg>
                            {{ $message }}
                        </b>
                    @enderror
                </div>
                <x-elems.button value="Login" class="py-3 mt-3 w-full" tabindex="3" />
            </form>
            <div class="flex flex-col items-center mx-auto w-min">
                <p class="whitespace-nowrap">
                    {{ __("Don't have an account?") }}
                </p>
                <a href="{{ route('register') }}" class="mt-3 whitespace-nowrap" tabindex="4">
                    {{ __("Sign up") }}
                </a>
            </div>
        </div>
    </main>
@endsection
