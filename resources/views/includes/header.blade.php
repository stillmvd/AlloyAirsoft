<header class="w-full flex flex-col lg:pt-8">
    @guest
        <div class="w-full flex items-center sm:items-end flex-col sm:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <a href="{{ route('index') }}" class="text-[1.8rem] sm:text-[2.5rem] mb-4 lg:mb-0 col-span-2 lg:col-span-1 w-full lg:w-min bg-card_bg lg:bg-transparent text-white p-6 lg:p-0 whitespace-normal sm:whitespace-nowrap rounded-bl-xl rounded-br-xl sm:rounded-xl sm:my-4 lg:my-0 text-center font-normal">
                Alloy Airsoft
            </a>
            <div class="flex flex-row items-center mb-4 sm:mb-0 sm:items-start lg:items-center sm:justify-start lg:justify-center">
                <div class="flex bg-dark rounded-xl">
                    <a href="{{ route('index') }}" class="w-min select-none whitespace-nowrap px-6 py-4 rounded-tl-xl rounded-bl-xl ease-out duration-100 hover:bg-dark {{ Route::is('index') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Games') }}
                    </a>
                    <a href="{{ route('archive') }}" class="w-min select-none whitespace-nowrap px-6 py-4 rounded-tr-xl rounded-br-xl ease-out duration-100 hover:bg-dark {{ Route::is('archive') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Archive') }}
                    </a>
                </div>
            </div>
            <div class="flex items-end sm:place-self-end">
                <div class="cursor-pointer hidden items-center justify-center" onclick="switchMode()" id="toggle">
                    <label class="swap swap-rotate">
                        <input type="checkbox" />
                        <svg id="moon" class="swap-on fill-transparent stroke-white w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /></svg>
                        <svg id="sun" class="swap-off fill-transparent stroke-bg w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" /></svg>
                    </label>
                </div>
                <a href="{{ route('login') }}" class="w-min select-none whitespace-nowrap px-6 py-4 ml-5 rounded-xl ease-out duration-100 hover:bg-dark {{ Route::is('login') ? 'bg-dark' : 'bg-card_bg' }}">
                    {{ __('Account') }}
                </a>
            </div>
        </div>
    @endguest
    @auth

        {{-- Шапка для маленьких экранов --}}

        <div class="flex w-full md:hidden flex-col gap-y-4 justify-center">
            <a href="{{ route('index') }}" class="text-[1.8rem] whitespace-normal sm:text-[2.5rem] bg-card_bg text-white mx-auto p-6 w-full sm:whitespace-nowrap rounded-bl-xl rounded-br-xl sm:rounded-xl sm:mt-4 lg:my-0 text-center font-normal">
                Alloy Airsoft
            </a>
            @if(userIsAdmin(Auth::id()))
                @if (Route::is('admin') || Route::is('players') || Route::is('users'))
                    <a href="{{ route('admin') }}" class="w-full whitespace-nowrap px-6 py-4 rounded-xl ease-out {{ Route::is('admin') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Control') }}
                    </a>
                    <a href="{{ route('players') }}" class="w-full whitespace-nowrap px-6 py-4 rounded-xl ease-out {{ Route::is('players') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Players') }}
                    </a>
                    <a href="{{ route('users') }}" class="w-full whitespace-nowrap px-6 py-4 rounded-xl ease-out {{ Route::is('users') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Users') }}
                    </a>
                @elseif (Route::is('game'))
                    <a href="{{ route('index') }}" class="w-full text-left whitespace-nowrap px-6 py-4 rounded-xl ease-out {{ Route::is('index') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Upcoming games') }}
                    </a>
                    <a href="{{ route('archive') }}" class="w-full text-left whitespace-nowrap px-6 py-4 rounded-xl ease-out {{ Route::is('archive') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Finished games') }}
                    </a>
                    <div class="flex flex-col items-center bg-card_bg rounded-xl">
                        <a href="{{ route('edit', $game->id) }}" class="whitespace-nowrap flex items-center px-6 py-3 rounded-tl-xl rounded-bl-xl ease-out">
                            {{ __('Edit this game') }}
                        </a>
                        <form action="{{ route('delete', $game->id) }}" method="POST" class="rounded-tr-xl cursor-pointer rounded-br-xl ease-out">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete this game" class="cursor-pointer px-6 py-3 text-white text-base font-medium whitespace-nowrap">
                        </form>
                    </div>
                @elseif(Route::is('index') || Route::is('archive') || Route::is('edit'))
                    <a href="{{ route('index') }}" class="w-full text-left whitespace-nowrap px-6 py-4 rounded-xl ease-out {{ Route::is('index') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Upcoming games') }}
                    </a>
                    <a href="{{ route('archive') }}" class="w-full text-left whitespace-nowrap px-6 py-4 rounded-xl ease-out {{ Route::is('archive') ? 'bg-dark' : 'bg-card_bg' }}">
                        {{ __('Finished games') }}
                    </a>
                @endif
                @if (Route::is('admin'))
                    <div class="flex w-full justify-between bg-card_bg rounded-xl">
                        <a href="{{ route('credential') }}" class="w-1/2 whitespace-nowrap px-6 py-4 rounded-tl-xl rounded-bl-xl ease-out {{ Route::is('credential') ? 'bg-dark' : '' }}">
                            {{ __('Change credential') }}
                        </a>
                        <a href="{{ route('logout') }}" class="w-1/2 whitespace-nowrap text-right px-6 py-4 rounded-tr-xl rounded-br-xl ease-out">
                            {{ __('Logout') }}
                        </a>
                    </div>
                @elseif(Route::is('index') || Route::is('archive') || Route::is('credential'))
                    <div class="flex w-full bg-card_bg rounded-xl justify-center">
                        <a href="{{ route('admin') }}" class="w-full whitespace-nowrap px-6 py-4 rounded-xl">
                            {{ __('Admin panel') }}
                        </a>
                    </div>
                @endif
            @endif
            @if(!userIsAdmin(Auth::id()))
                <div class="flex flex-row items-center justify-center sm:items-start lg:items-center lg:justify-center">
                    <div class="flex bg-dark rounded-xl">
                        <a href="{{ route('index') }}" class="w-min select-none whitespace-nowrap px-6 py-4 rounded-tl-xl rounded-bl-xl ease-out duration-100 hover:bg-dark {{ Route::is('index') ? 'bg-dark' : 'bg-card_bg' }}">
                            {{ __('Games') }}
                        </a>
                        <a href="{{ route('archive') }}" class="w-min select-none whitespace-nowrap px-6 py-4 rounded-tr-xl rounded-br-xl ease-out duration-100 hover:bg-dark {{ Route::is('archive') ? 'bg-dark' : 'bg-card_bg' }}">
                            {{ __('Archive') }}
                        </a>
                    </div>
                </div>
                @if (Route::is('personal_account'))
                    <div class="flex flex-row items-end place-self-center bg-dark rounded-xl">
                        <a href="{{ route('logout') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-xl ease-out duration-100 bg-card_bg hover:bg-dark">
                            {{ __('Logout') }}
                        </a>
                    </div>
                @else
                    <div class="flex flex-row items-end place-self-center bg-dark rounded-xl">
                        <a id="login" href="{{ route('personal_account', Auth::id()) }}" class="w-min whitespace-nowrap px-6 py-4 rounded-xl ease-out duration-100 hover:bg-dark {{ Route::is('personal_account') ? 'bg-dark' : 'bg-card_bg' }}">
                            {{ __('Profile') }}
                        </a>
                    </div>
                @endif
            @endif
        </div>

        {{-- Шапка для больших экранов --}}

        <div class="hidden w-full md:grid md:grid-cols-2 lg:grid-cols-3 justify-between">
            <a href="{{ route('index') }}" class="text-[2.5rem] bg-card_bg text-white md:col-span-2 lg:col-span-1 p-6 lg:p-0 w-full mb-4 lg:mb-0 lg:bg-transparent lg:w-min rounded-xl whitespace-nowrap sm:mt-4 lg:my-0 text-center font-normal">
                Alloy Airsoft
            </a>
            @if (userIsAdmin(Auth::id()))
                <div class="flex flex-row items-center justify-start lg:justify-center">
                    @if (Route::is('admin') || Route::is('players') || Route::is('users'))
                        <div class="flex w-min bg-card_bg rounded-xl">
                            <a href="{{ route('admin') }}" class="w-1/2 lg:w-min text-left whitespace-nowrap px-6 py-4 rounded-tl-xl rounded-bl-xl ease-out duration-100 hover:bg-dark {{ Route::is('admin') ? 'bg-dark' : 'bg-card_bg' }}">
                                {{ __('Control') }}
                            </a>
                            <a href="{{ route('players') }}" class="w-1/2 lg:w-min text-right whitespace-nowrap px-6 py-4 ease-out duration-100 hover:bg-dark {{ Route::is('players') ? 'bg-dark' : 'bg-card_bg' }}">
                                {{ __('Players') }}
                            </a>
                            <a href="{{ route('users') }}" class="w-1/2 lg:w-min text-right whitespace-nowrap px-6 py-4 rounded-tr-xl rounded-br-xl ease-out duration-100 hover:bg-dark {{ Route::is('users') ? 'bg-dark' : 'bg-card_bg' }}">
                                {{ __('Users') }}
                            </a>
                        </div>
                    @elseif (Route::is('credential') || Route::is('edit'))
                        <div class="hidden md:flex flex-row items-center justify-center">

                        </div>
                    @elseif (Route::is('game'))
                        <div class="flex flex-row items-center justify-center">
                            <div class="flex bg-card_bg rounded-xl">
                                <a href="{{ route('edit', $game->id) }}" class="w-min whitespace-nowrap flex items-center px-6 py-3 rounded-tl-xl rounded-bl-xl ease-out duration-100 hover:bg-dark {{ Route::is('index') ? 'bg-dark' : 'bg-card_bg' }}">
                                    {{ __('Edit this game') }}
                                </a>
                                <form action="{{ route('delete', $game->id) }}" method="POST" class="w-min rounded-tr-xl cursor-pointer rounded-br-xl ease-out duration-100 hover:bg-dark {{ Route::is('archive') ? 'bg-dark' : 'bg-card_bg' }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete this game" class="cursor-pointer px-6 py-3 text-white text-base font-medium whitespace-nowrap">
                                </form>
                            </div>
                        </div>
                    @elseif(Route::is('index') || Route::is('archive'))
                        <div class="flex flex-row items-center justify-center">
                            <div class="flex bg-card_bg rounded-xl">
                                <a href="{{ route('index') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tl-xl rounded-bl-xl ease-out duration-100 hover:bg-dark {{ Route::is('index') ? 'bg-dark' : 'bg-card_bg' }}">
                                    {{ __('Upcoming games') }}
                                </a>
                                <a href="{{ route('archive') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tr-xl rounded-br-xl ease-out duration-100 hover:bg-dark {{ Route::is('archive') ? 'bg-dark' : 'bg-card_bg' }}">
                                    {{ __('Finished games') }}
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="flex flex-row items-center justify-end">
                    @if (Route::is('admin'))
                        <div class="flex bg-card_bg rounded-xl">
                            <a href="{{ route('credential') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tl-xl rounded-bl-xl ease-out duration-100 hover:bg-dark {{ Route::is('') ? 'bg-dark' : '' }}">
                                {{ __('Change credential') }}
                            </a>
                            <a href="{{ route('logout') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tr-xl rounded-br-xl ease-out duration-100 hover:bg-dark {{ Route::is('') ? 'bg-dark' : '' }}">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    @else
                        <div class="flex bg-card_bg rounded-xl justify-center ml-20 md:ml-0">
                            <a href="{{ route('admin') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-xl ease-out duration-100 hover:bg-dark">
                                {{ __('Admin panel') }}
                            </a>
                        </div>
                    @endif
                </div>
            @endif
            @if(!userIsAdmin(Auth::id()))
                <div class="flex flex-row items-center justify-center sm:items-start lg:items-center sm:justify-start lg:justify-center">
                    <div class="flex bg-dark rounded-xl">
                        <a href="{{ route('index') }}" class="w-min select-none whitespace-nowrap px-6 py-4 rounded-tl-xl rounded-bl-xl ease-out duration-100 hover:bg-dark {{ Route::is('index') ? 'bg-dark' : 'bg-card_bg' }}">
                            {{ __('Games') }}
                        </a>
                        <a href="{{ route('archive') }}" class="w-min select-none whitespace-nowrap px-6 py-4 rounded-tr-xl rounded-br-xl ease-out duration-100 hover:bg-dark {{ Route::is('archive') ? 'bg-dark' : 'bg-card_bg' }}">
                            {{ __('Archive') }}
                        </a>
                    </div>
                </div>
                @if (Route::is('personal_account'))
                    <div class="hidden sm:flex flex-row items-end place-self-end">
                        <a href="{{ route('logout') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-xl ease-out duration-100 bg-card_bg hover:bg-dark">
                            {{ __('Logout') }}
                        </a>
                    </div>
                @else
                    <div class="hidden sm:flex flex-row items-end place-self-end">
                        <a id="login" href="{{ route('personal_account', Auth::id()) }}" class="w-min whitespace-nowrap px-6 py-4 rounded-xl ease-out duration-100 hover:bg-dark {{ Route::is('personal_account') ? 'bg-dark' : 'bg-card_bg' }}">
                            {{ __('Profile') }}
                        </a>
                    </div>
                @endif
            @endif
        </div>

    @endauth
    <x-elems.separator class="mt-6" />
</header>
