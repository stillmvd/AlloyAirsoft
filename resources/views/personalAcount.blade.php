@extends('layouts.base')

@section('title', 'Personal Acount')

@section('content')
    <div class="hidden lg:grid w-full 2xl:w-[90%] grid-cols-1 lg:grid-cols-3 gap-10 mx-auto my-20">
        <div class="w-full rounded-2xl bg-card_bg/50 px-6 pb-6">
            <h3 class="my-10">
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
        <div class="w-[100%] rounded-2xl bg-card_bg/50 px-6 pb-6">
            <div class="w-full flex flex-row items-center justify-center gap-x-10 my-10">
                @if (Auth::user()->pathToAvatar != NULL)
                    <img src="{{ asset(Auth::user()->pathToAvatar) }}" alt="avatar" class="w-28 h-28 rounded-full">
                @else
                    <img src="{{ asset('image/avatar_not_found.png') }}" alt="avatar" class="w-28 h-28 rounded-full">
                @endif
                <div class="flex flex-col gap-y-4">
                    <div title="upload your image">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.8" stroke="white" class="w-14 h-14 bg-dark/75 p-3 rounded-full cursor-pointer ease-out duration-100 hover:bg-[#292929]" onclick="findFile()">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                    </div>
                    @if (Auth::user()->pathToAvatar != NULL)
                        <div title="delete avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.8" stroke="white" class="w-14 h-14 bg-dark/75 p-3 rounded-full cursor-pointer ease-out duration-100 hover:bg-[#292929]" onclick="deleteFile()">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            <form method="POST" action="{{ route('deleteAvatar', Auth::user()->id) }}" id="deleteForm">
                                @csrf
                                <input type="submit" class="hidden">
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            <form method="POST" action="{{ route('saveAvatar') }}" enctype="multipart/form-data" id="avatarForm" class="flex flex-col m-auto">
                @csrf
                <div class="hidden">
                    <input type="file" id="hiddenFile" accept="image/*" name="avatar">
                    <input type="submit">
                </div>
            </form>
            <div class="bg-dark w-full p-4 rounded-xl">
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
        <div class="w-full rounded-2xl bg-card_bg/50 px-6 pb-6">
            <h3 class="my-10">
                {{ __('Your achievements') }}
            </h3>
            @for ($i = 0; $i < count($achievements); $i++)
                <div class="flex flex-row items-center">
                    <b class="mr-4">
                        {{ $achievements[$i]->nameAchievement }}
                    </b>
                    @if($achievements[$i]->pathToachievement != NULL)
                        <img src="{{ asset($achievements[$i]->pathToachievement) }}" alt="{{ "achievement " . $achievements[$i]->nameAchievement }}">
                    @endif
                    <p>
                        {{ $achievements[$i]->description }}
                    </p>
                </div>
            @endfor
        </div>
        <div class="flex col-span-3 flex-col w-full rounded-2xl bg-card_bg/50 px-6 pb-6">
            <h3 class="my-10 text-center">
                {{ __('Personal info') }}
            </h3>
            <form action="{{ route('changeCredentialForUser') }}" method="POST" class="flex flex-col gap-y-6 w-1/3 mx-auto">
                @csrf
                <div class="flex relative flex-col">
                    <x-text.label id="label_name" class="z-10" for="namePlayer">{{ __('Name') }}</x-text.label>
                    <x-elems.input id="input_name" class="bg-transparent h-16" type="text" name="namePlayer" value="{{ $player->name }}"/>
                    @error('namePlayer')
                        <b class="px-6 py-2 w-min absolute z-20 -bottom-[40%] -right-[10%] rounded-2xl bg-card_bg text-red font-medium flex flex-row items-center whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                            </svg>
                            {{ $message }}
                        </b>
                    @enderror
                </div>
                <div class="flex relative flex-col">
                    <x-text.label id="label_surname" class="z-10" for="surnamePlayer">{{ __('Surname') }}</x-text.label>
                    <x-elems.input id="input_surname" class="bg-transparent h-16" type="text" name="surnamePlayer" value="{{ $player->surname }}"/>
                    @error('surnamePlayer')
                        <b class="px-6 py-2 w-min absolute z-20 -bottom-[40%] -right-[10%] rounded-2xl bg-card_bg text-red font-medium flex flex-row items-center whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                            </svg>
                            {{ $message }}
                        </b>
                    @enderror
                </div>
                <div class="flex relative flex-col">
                    <x-text.label id="label_callsign" class="z-10" for="callsignPlayer">{{ __('Callsign') }}</x-text.label>
                    <x-elems.input id="input_callsign" class="bg-transparent h-16" type="text" name="callsignPlayer" value="{{ $player->callsign }}"/>
                    @error('callsignPlayer')
                        <b class="px-6 py-2 w-min absolute z-20 -bottom-[40%] -right-[10%] rounded-2xl bg-card_bg text-red font-medium flex flex-row items-center whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                            </svg>
                            {{ $message }}
                        </b>
                    @enderror
                </div>
                <div class="flex relative flex-col">
                    <x-text.label id="label_phone" class="z-10" for="phonePlayer">{{ __('Phone') }}</x-text.label>
                    <x-elems.input id="input_phone" class="bg-transparent h-16" type="text" name="phonePlayer" value="{{ $player->phone }}"/>
                    @error('phonePlayer')
                        <b class="px-6 py-2 w-min absolute z-20 -bottom-[40%] -right-[10%] rounded-2xl bg-card_bg text-red font-medium flex flex-row items-center whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                            </svg>
                            {{ $message }}
                        </b>
                    @enderror
                </div>
                <x-elems.button value="Save" class="mt-4 py-4 w-full" />
            </form>
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
                <input type="file" name="avatar" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"/>
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
        </div>
        <div class="w-full rounded-2xl bg-card_bg/50 p-6">
            <h3>
                {{ __('Your achievements') }}
            </h3>
        </div>
    </div>
@endsection
