<header class="w-full pt-12 lg:pt-8 justify-center grid grid-cols-1 md:flex md:grid-cols-3 md:justify-between">
    <a href="{{ route('index') }}" id="ticket" onfocus="pull()" onblur="pullUp()" class="lg:hidden flex items-center justify-center absolute top-[-50px] ease duration-200 left-0 right-0 mx-auto py-6 z-50 bg-card_bg ring-2 ring-subwhite rounded-br-2xl rounded-bl-2xl">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-main stroke-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
        </svg>          
    </a>
    @guest
        <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <a href="{{ route('index') }}" class="hidden text-[2.5rem] text-white font-normal lg:block">
                Alloy Airsoft
            </a>
            <div class="flex flex-row items-center justify-center md:items-start lg:items-center md:justify-start lg:justify-center">
                <div class="flex bg-dark rounded-2xl">
                    <a href="{{ route('index') }}" class="w-min select-none whitespace-nowrap px-6 py-4 rounded-tl-2xl rounded-bl-2xl ease-out duration-100 hover:bg-card_bg {{ Route::is('index') ? 'bg-card_bg/75' : '' }}">
                        {{ __('Upcoming') }}
                    </a>
                    <a href="{{ route('archive') }}" class="w-min select-none whitespace-nowrap px-6 py-4 rounded-tr-2xl rounded-br-2xl ease-out duration-100 hover:bg-card_bg {{ Route::is('archive') ? 'bg-card_bg/75' : '' }}">
                        {{ __('Archive') }}
                    </a>
                </div>
            </div>
            <div class="hidden md:flex flex-row items-end place-self-end">
                <b class="text-5xl mr-3 font-normal select-none">
                    {{ now()->format('d') }}
                </b>
                <p class="leading-6 select-none">
                    {{ now()->format('M') }}
                </p>
            </div>
        </div>
    @endguest
    @auth
        <div class="flex w-full md:hidden flex-col gap-y-4 justify-center">
            <a href="{{ route('index') }}" class="hidden text-[2.5rem] text-white font-normal lg:flex">
                Alloy Airsoft
            </a>
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
        </div>

        {{-- -------------------------------------------------------------------------------------------------------------------------- --}}

        <div class="hidden w-full md:grid md:grid-cols-2 lg:grid-cols-3 justify-between">
            <a href="{{ route('index') }}" class="hidden text-[2.5rem] text-white font-normal lg:block">
                Alloy Airsoft
            </a>
            <div class="flex flex-row items-center justify-start lg:justify-center">
                @if (Route::is('admin') || Route::is('players'))
                    <div class="flex w-min bg-card_bg rounded-2xl">
                        <a href="{{ route('admin') }}" class="w-1/2 lg:w-min text-left whitespace-nowrap px-6 py-4 rounded-tl-2xl rounded-bl-2xl ease-out duration-100 hover:bg-dark {{ Route::is('admin') ? 'bg-dark' : '' }}">
                            {{ __('Control') }}
                        </a>
                        <a href="{{ route('players') }}" class="w-1/2 lg:w-min text-right whitespace-nowrap px-6 py-4 rounded-tr-2xl rounded-br-2xl ease-out duration-100 hover:bg-dark {{ Route::is('players') ? 'bg-dark' : '' }}">
                            {{ __('Players') }}
                        </a>
                    </div>
                @elseif (Route::is('credential') || Route::is('edit'))
                    <div class="hidden md:flex flex-row items-center justify-center">
                        
                    </div>
                @elseif (Route::is('game'))
                    <div class="flex flex-row items-center justify-center">
                        <div class="flex bg-card_bg rounded-2xl">
                            <a href="{{ route('edit', $game->id) }}" class="w-min whitespace-nowrap flex items-center px-6 py-3 rounded-tl-2xl rounded-bl-2xl ease-out duration-100 hover:bg-dark {{ Route::is('index') ? 'bg-dark' : '' }}">
                                {{ __('Edit this game') }}
                            </a>
                            <form action="{{ route('delete', $game->id) }}" method="POST" class="w-min rounded-tr-2xl cursor-pointer rounded-br-2xl ease-out duration-100 hover:bg-dark {{ Route::is('archive') ? 'bg-dark' : '' }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete this game" class="cursor-pointer px-6 py-3 text-white text-base font-medium whitespace-nowrap">
                            </form>
                        </div>
                    </div>
                @elseif(Route::is('index') || Route::is('archive'))
                    <div class="flex flex-row items-center justify-center">
                        <div class="flex bg-card_bg rounded-2xl">
                            <a href="{{ route('index') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tl-2xl rounded-bl-2xl ease-out duration-100 hover:bg-dark {{ Route::is('index') ? 'bg-dark' : '' }}">
                                {{ __('Upcoming games') }}
                            </a>
                            <a href="{{ route('archive') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tr-2xl rounded-br-2xl ease-out duration-100 hover:bg-dark {{ Route::is('archive') ? 'bg-dark' : '' }}">
                                {{ __('Finished games') }}
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="flex flex-row items-center justify-end">
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
            </div>
        </div>
    @endauth
</header>
<x-elems.separator class="mt-6" />
