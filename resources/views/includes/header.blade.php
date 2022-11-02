<header class="w-full lg:pt-8 justify-center grid grid-cols-1 md:flex md:grid-cols-3 md:justify-between">
    @guest
        <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <a href="{{ route('index') }}" class="text-[1.8rem] sm:text-[2.5rem] mb-4 lg:mb-0 col-span-2 lg:col-span-1 w-full lg:w-min bg-card_bg lg:bg-transparent text-white p-6 lg:p-0 whitespace-normal sm:whitespace-nowrap rounded-bl-2xl rounded-br-2xl sm:rounded-2xl sm:my-4 lg:my-0 text-center font-normal">
                Alloy Airsoft
            </a>
            <div class="flex flex-row items-center justify-center sm:items-start lg:items-center sm:justify-start lg:justify-center">
                <div class="flex bg-dark rounded-2xl">
                    <a href="{{ route('index') }}" class="w-min select-none whitespace-nowrap px-6 py-4 rounded-tl-2xl rounded-bl-2xl ease-out duration-100 hover:bg-dark {{ Route::is('index') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Upcoming') }}
                    </a>
                    <a href="{{ route('archive') }}" class="w-min select-none whitespace-nowrap px-6 py-4 rounded-tr-2xl rounded-br-2xl ease-out duration-100 hover:bg-dark {{ Route::is('archive') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Archive') }}
                    </a>
                </div>
            </div>
            {{-- <div class="hidden sm:flex flex-row items-end place-self-end">
                <b class="text-5xl mr-3 font-normal select-none">
                    {{ now()->format('d') }}
                </b>
                <p class="leading-6 select-none">
                    {{ now()->format('M') }}
                </p>
            </div> --}}
            <div class="hidden sm:flex flex-row items-end place-self-end">
                <a href="{{ route('account') }}" class="w-min select-none whitespace-nowrap px-6 py-4 rounded-2xl ease-out duration-100 hover:bg-dark {{ Route::is('account') ? 'bg-dark' : 'bg-card_bg' }}">
                    {{ __('Account') }}
                </a>
            </div>
        </div>
    @endguest
    @auth

        {{-- Шапка для маленьких экранов --}}

        <div class="flex w-full md:hidden flex-col gap-y-4 justify-center">
            <a href="{{ route('index') }}" class="text-[1.8rem] whitespace-normal sm:text-[2.5rem] bg-card_bg text-white mx-auto p-6 w-full sm:whitespace-nowrap rounded-bl-2xl rounded-br-2xl sm:rounded-2xl sm:mt-4 lg:my-0 text-center font-normal">
                Alloy Airsoft
            </a>
            @if(userIsAdmin(Auth::id()))
                @if (Route::is('admin') || Route::is('players'))
                    <a href="{{ route('admin') }}" class="w-full whitespace-nowrap px-6 py-4 rounded-2xl ease-out {{ Route::is('admin') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Control') }}
                    </a>
                    <a href="{{ route('players') }}" class="w-full whitespace-nowrap px-6 py-4 rounded-2xl ease-out {{ Route::is('players') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Players') }}
                    </a>
                @elseif (Route::is('game'))
                    <a href="{{ route('index') }}" class="w-full text-left whitespace-nowrap px-6 py-4 rounded-2xl ease-out {{ Route::is('index') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Upcoming games') }}
                    </a>
                    <a href="{{ route('archive') }}" class="w-full text-left whitespace-nowrap px-6 py-4 rounded-2xl ease-out {{ Route::is('archive') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Finished games') }}
                    </a>
                    <div class="flex flex-col items-center bg-card_bg rounded-2xl">
                        <a href="{{ route('edit', $game->id) }}" class="whitespace-nowrap flex items-center px-6 py-3 rounded-tl-2xl rounded-bl-2xl ease-out">
                            {{ __('Edit this game') }}
                        </a>
                        <form action="{{ route('delete', $game->id) }}" method="POST" class="rounded-tr-2xl cursor-pointer rounded-br-2xl ease-out">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete this game" class="cursor-pointer px-6 py-3 text-white text-base font-medium whitespace-nowrap">
                        </form>
                    </div>
                @elseif(Route::is('index') || Route::is('archive') || Route::is('edit'))
                    <a href="{{ route('index') }}" class="w-full text-left whitespace-nowrap px-6 py-4 rounded-2xl ease-out {{ Route::is('index') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Upcoming games') }}
                    </a>
                    <a href="{{ route('archive') }}" class="w-full text-left whitespace-nowrap px-6 py-4 rounded-2xl ease-out {{ Route::is('archive') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Finished games') }}
                    </a>
                @endif
            @endif
            @if(userIsAdmin(Auth::id()))
                @if (Route::is('admin'))
                    <div class="flex w-full justify-between bg-card_bg rounded-2xl">
                        <a href="{{ route('credential') }}" class="w-1/2 whitespace-nowrap px-6 py-4 rounded-tl-2xl rounded-bl-2xl ease-out {{ Route::is('credential') ? 'bg-dark' : '' }}">
                            {{ __('Change credential') }}
                        </a>
                        <a href="{{ route('logout') }}" class="w-1/2 whitespace-nowrap text-right px-6 py-4 rounded-tr-2xl rounded-br-2xl ease-out">
                            {{ __('Logout') }}
                        </a>
                    </div>
                @elseif(Route::is('index') || Route::is('archive') || Route::is('credential'))
                    <div class="flex w-full bg-card_bg rounded-2xl justify-center">
                        <a href="{{ route('admin') }}" class="w-full whitespace-nowrap px-6 py-4 rounded-2xl">
                            {{ __('Admin panel') }}
                        </a>
                    </div>
                @endif
            @endif
        </div>

        {{-- Шапка для больших экранов --}}

        <div class="hidden w-full md:grid md:grid-cols-2 lg:grid-cols-3 justify-between">
            <a href="{{ route('index') }}" class="text-[2.5rem] bg-card_bg text-white md:col-span-2 lg:col-span-1 p-6 lg:p-0 w-full mb-4 lg:mb-0 lg:bg-transparent lg:w-min rounded-2xl whitespace-nowrap sm:mt-4 lg:my-0 text-center font-normal">
                Alloy Airsoft
            </a>
            <div class="flex flex-row items-center justify-start lg:justify-center">
                @if (userIsAdmin(Auth::id()))
                    @if (Route::is('admin') || Route::is('players'))
                        <div class="flex w-min bg-card_bg rounded-2xl">
                            <a href="{{ route('admin') }}" class="w-1/2 lg:w-min text-left whitespace-nowrap px-6 py-4 rounded-tl-2xl rounded-bl-2xl ease-out duration-100 hover:bg-dark {{ Route::is('admin') ? 'bg-dark' : 'bg-card_bg' }}">
                                {{ __('Control') }}
                            </a>
                            <a href="{{ route('players') }}" class="w-1/2 lg:w-min text-right whitespace-nowrap px-6 py-4 rounded-tr-2xl rounded-br-2xl ease-out duration-100 hover:bg-dark {{ Route::is('players') ? 'bg-dark' : 'bg-card_bg' }}">
                                {{ __('Players') }}
                            </a>
                        </div>
                    @elseif (Route::is('credential') || Route::is('edit'))
                        <div class="hidden md:flex flex-row items-center justify-center">

                        </div>
                    @elseif (Route::is('game'))
                        <div class="flex flex-row items-center justify-center">
                            <div class="flex bg-card_bg rounded-2xl">
                                <a href="{{ route('edit', $game->id) }}" class="w-min whitespace-nowrap flex items-center px-6 py-3 rounded-tl-2xl rounded-bl-2xl ease-out duration-100 hover:bg-dark {{ Route::is('index') ? 'bg-dark' : 'bg-card_bg' }}">
                                    {{ __('Edit this game') }}
                                </a>
                                <form action="{{ route('delete', $game->id) }}" method="POST" class="w-min rounded-tr-2xl cursor-pointer rounded-br-2xl ease-out duration-100 hover:bg-dark {{ Route::is('archive') ? 'bg-dark' : 'bg-card_bg' }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete this game" class="cursor-pointer px-6 py-3 text-white text-base font-medium whitespace-nowrap">
                                </form>
                            </div>
                        </div>
                    @elseif(Route::is('index') || Route::is('archive'))
                        <div class="flex flex-row items-center justify-center">
                            <div class="flex bg-card_bg rounded-2xl">
                                <a href="{{ route('index') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tl-2xl rounded-bl-2xl ease-out duration-100 hover:bg-dark {{ Route::is('index') ? 'bg-dark' : 'bg-card_bg' }}">
                                    {{ __('Upcoming games') }}
                                </a>
                                <a href="{{ route('archive') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tr-2xl rounded-br-2xl ease-out duration-100 hover:bg-dark {{ Route::is('archive') ? 'bg-dark' : 'bg-card_bg' }}">
                                    {{ __('Finished games') }}
                                </a>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
            <div class="flex flex-row items-center justify-end">
                @if(userIsAdmin(Auth::id()))
                    @if (Route::is('admin'))
                        <div class="flex bg-card_bg rounded-2xl">
                            <a href="{{ route('credential') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tl-2xl rounded-bl-2xl ease-out duration-100 hover:bg-dark {{ Route::is('') ? 'bg-dark' : '' }}">
                                {{ __('Change credential') }}
                            </a>
                            <a href="{{ route('logout') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tr-2xl rounded-br-2xl ease-out duration-100 hover:bg-dark {{ Route::is('') ? 'bg-dark' : '' }}">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    @else
                        <div class="flex bg-card_bg rounded-2xl justify-center ml-20 md:ml-0">
                            <a href="{{ route('admin') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-2xl ease-out duration-100 hover:bg-dark">
                                {{ __('Admin panel') }}
                            </a>
                        </div>
                    @endif
                @endif
                @if(Auth::user() && !userIsAdmin(Auth::id()))
                    <a href="{{ route('personal_account', Auth::id()) }}" class="whitespace-nowrap pr-2">
                    Personal Acount
                    </a>
                @elseif (! Auth::user())
                    <div class="pl-2 flex flex-row items-center">
                        <a id="login" href="{{ route('login') }}" class="whitespace-nowrap pr-2">
                            Log in
                        </a>
                        <a href="{{ route('register') }}">
                            Registration
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @endauth
</header>
<x-elems.separator class="mt-6" />
