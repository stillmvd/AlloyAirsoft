<header class="relative pt-8 grid grid-cols-3 gap-x-6 justify-between w-full">
    <a href="{{ route('index') }}" class="text-[2.5rem] text-white font-normal">
        Alloy Airsoft
    </a>
    @guest
        <div class="flex flex-row items-center justify-center">
            <div class="flex bg-dark rounded-2xl">
                <a href="{{ route('index') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tl-2xl rounded-bl-2xl ease-out duration-100 hover:bg-card_bg {{ Route::is('index') ? 'bg-card_bg/75' : '' }}">
                    {{ __('Upcoming') }}
                </a>
                <a href="{{ route('archive') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tr-2xl rounded-br-2xl ease-out duration-100 hover:bg-card_bg {{ Route::is('archive') ? 'bg-card_bg/75' : '' }}">
                    {{ __('Archive') }}
                </a>
            </div>
        </div>
    @endguest
    @auth
        @if (Route::is('admin') || Route::is('players'))
            <div class="flex flex-row items-center justify-center">
                <div class="flex bg-dark rounded-2xl">
                    <a href="{{ route('admin') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tl-2xl rounded-bl-2xl ease-out duration-100 hover:bg-card_bg {{ Route::is('admin') ? 'bg-card_bg/75' : '' }}">
                        {{ __('Control') }}
                    </a>
                    <a href="{{ route('players') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tr-2xl rounded-br-2xl ease-out duration-100 hover:bg-card_bg {{ Route::is('players') ? 'bg-card_bg/75' : '' }}">
                        {{ __('Players') }}
                    </a>
                </div>
            </div>
        @elseif (Route::is('credential') || Route::is('edit'))
            <div class="flex flex-row items-center justify-center">
                
            </div>
        @elseif (Route::is('game'))
            <div class="flex flex-row items-center justify-center">
                <div class="flex bg-dark rounded-2xl">
                    <a href="{{ route('edit', $game->id) }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tl-2xl rounded-bl-2xl ease-out duration-100 hover:bg-card_bg {{ Route::is('index') ? 'bg-card_bg/75' : '' }}">
                        {{ __('Edit this game') }}
                    </a>
                    <a href="{{ route('delete', $game->id) }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tr-2xl rounded-br-2xl ease-out duration-100 hover:bg-card_bg {{ Route::is('archive') ? 'bg-card_bg/75' : '' }}">
                        {{ __('Delete this game') }}
                    </a>
                </div>
            </div>
        @else
            <div class="flex flex-row items-center justify-center">
                <div class="flex bg-dark rounded-2xl">
                    <a href="{{ route('index') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tl-2xl rounded-bl-2xl ease-out duration-100 hover:bg-card_bg {{ Route::is('index') ? 'bg-card_bg/75' : '' }}">
                        {{ __('Upcoming games') }}
                    </a>
                    <a href="{{ route('archive') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tr-2xl rounded-br-2xl ease-out duration-100 hover:bg-card_bg {{ Route::is('archive') ? 'bg-card_bg/75' : '' }}">
                        {{ __('Finished games') }}
                    </a>
                </div>
            </div>
        @endif
        <div class="flex flex-row items-center justify-end">
            @if (Route::is('admin'))
                <div class="flex bg-dark rounded-2xl">
                    <a href="{{ route('credential') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tl-2xl rounded-bl-2xl ease-out duration-100 hover:bg-card_bg">
                        {{ __('Change credential') }}
                    </a>
                    <a href="{{ route('logout') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-tr-2xl rounded-br-2xl ease-out duration-100 hover:bg-card_bg">
                        {{ __('Logout') }}
                    </a>
                </div>
            @else
                <div class="flex bg-dark rounded-2xl justify-center">
                    <a href="{{ route('admin') }}" class="w-min whitespace-nowrap px-6 py-4 rounded-2xl ease-out duration-100 hover:bg-card_bg">
                        {{ __('Admin panel') }}
                    </a>
                </div>
            @endif
        </div>
    @endauth
    @guest
        <div class="flex flex-row items-end place-self-end">
            <b class="text-5xl mr-3 font-normal">
                {{ now()->format('d') }}
            </b>
            <p class="leading-6">
                {{ now()->format('M') }}
            </p>
        </div>
    @endguest
</header>
<x-elems.separator class="mt-6" />
