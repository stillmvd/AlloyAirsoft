@extends('layouts.base')

@section('title', 'Personal Acount')

@section('content')
    <div class="hidden lg:grid w-full 2xl:w-[90%] grid-cols-1 lg:grid-cols-3 gap-10 mx-auto my-20">
        <div class="w-full rounded-2xl bg-card_bg/50 p-6">
            <h3 class="mb-6">
                {{ __('Your games') }}
            </h3>
                    @foreach ($games as $game)
                            <div class="mt-10">
                                <a href="{{ route('game', $game->name) }}" class="bg-dark/75 hover:bg-dark w-full p-4 rounded-xl mt-4">
                                    {{ $game->name }}
                                </a>
                                <a href="" class="block bg-dark/75 group-hover:bg-[#292929] hover:scale-110 duration-100 ease-out rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="0.6" stroke="white" class="h-full w-14 scale-[56%] duration-150 ease-out">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                    </svg>
                                </a>
                            </div>
                    @endforeach
        </div>
        <div class="w-[100%] rounded-2xl bg-card_bg/50 p-6">
            @if (Auth::user()->pathToAvatar != NULL)
                <img src="{{ asset(Auth::user()->pathToAvatar) }}" alt="avatar" class="w-28 h-28 mx-auto rounded-full">
            @else
                <img src="{{ asset('image/avatar_not_found.png') }}" alt="avatar" class="w-28 h-28 mx-auto rounded-full">
            @endif
            <form method="POST" action="{{ route('saveAvatar') }}" enctype="multipart/form-data" class="flex flex-col m-auto">
                @csrf
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size"><b>Change avatar</b></label>
                <input type="file" name="avatar" class="block w-full text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700
                hover:file:bg-violet-100
                "/>
                <input class="" type="submit" value="Save">
            </form>
            <div class="bg-dark w-full p-4 rounded-xl mt-10">
                <b>
                    {{ __('Email') }}
                </b>
                <p>
                    {{ Auth::user()->email }}
                </p>
            </div>
            <div class="bg-dark w-full p-4 rounded-xl mt-4">
                <b>
                    {{ __('Registered') }}
                </b>
                <p>
                    {{ Auth::user()->created_at }}
                </p>
            </div>
        </div>
        <div class="w-full rounded-2xl bg-card_bg/50 p-6">
            <h3>
                {{ __('Your achievements') }}
            </h3>
        </div>
        <div class="w-[100%] rounded-2xl p-6">
        </div>
        <div class="w-[100%] rounded-2xl bg-card_bg/50 p-6">
            <form action="{{ route('changeCredentialForUser') }}" method="POST" class="grid grid-rows-4 gap-5">
                @csrf
                name
                <input type="text" name="name" value="{{ $player->name }}">
                surname
                <input type="text" name="surname" value="{{ $player->surname }}">
                callsign
                <input type="text" name="callsign" value="{{ $player->callsign }}">
                phone
                <input type="text" name="phone" value="{{ $player->phone }}">
                <input type="submit" value="Save">
            </form>
        </div>
        <div class="w-[100%] rounded-2x p-6">
        </div>
    </div>














    <div class="hidden sm:grid lg:hidden w-8/9 grid-cols-1 sm:grid-cols-2 gap-10 mx-auto my-20">
        <div class="w-[100%] col-span-2 rounded-2xl bg-card_bg/50 p-6">
            @if (Auth::user()->pathToAvatar != NULL)
                <img src="{{ asset(Auth::user()->pathToAvatar) }}" alt="avatar" class="w-28 h-28 mx-auto rounded-full">
            @else
                <img src="{{ asset('image/avatar_not_found.png') }}" alt="avatar" class="w-28 h-28 mx-auto rounded-full">
            @endif
            <form method="POST" action="{{ route('saveAvatar') }}" enctype="multipart/form-data" class="flex flex-col m-auto">
                @csrf
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size"><b>Change avatar</b></label>
                <input type="file" name="avatar" class="block w-full text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700
                hover:file:bg-violet-100
                "/>
                <input class="" type="submit" value="Сохранить">
            </form>
            <div class="bg-dark w-full p-4 rounded-xl mt-10">
                <b>
                    {{ __('Email') }}
                </b>
                <p>
                    {{ Auth::user()->email }}
                </p>
            </div>
            <div class="bg-dark w-full p-4 rounded-xl mt-4">
                <b>
                    {{ __('Registered') }}
                </b>
                <p>
                    {{ Auth::user()->created_at }}
                </p>
            </div>
        </div>
        <div class="w-full rounded-2xl bg-card_bg/50 p-6">
            <h3 class="mb-6">
                {{ __('Your games') }}
            </h3>
            @foreach ($players as $player)
                @if ($player->email = Auth::user()->email)
                    @foreach ($games as $game)
                        @if ($game->id = $player->game_id)
                            <div class="rounded-xl flex flex-row justify-between group bg-card_bg hover:bg-[#222222] duration-100 ease-out">
                                <a href="" class="block bg-dark/75 group-hover:bg-[#292929] hover:scale-110 duration-100 ease-out rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="0.6" stroke="white" class="h-full w-14 scale-[56%] duration-150 ease-out">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                </a>
                                <a href="{{ route('game', $game->name) }}" class="block w-full px-6 py-5 text-center bg-card_bg group-hover:bg-[#222222] duration-100 ease-out">
                                    {{ $game->name }}
                                </a>
                                <a href="" class="block bg-dark/75 group-hover:bg-[#292929] hover:scale-110 duration-100 ease-out rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="0.6" stroke="white" class="h-full w-14 scale-[56%] duration-150 ease-out">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                    </svg>
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
        <div class="w-full rounded-2xl bg-card_bg/50 p-6">
            <h3>
                {{ __('Your achievements') }}
            </h3>
        </div>
    </div>
@endsection

