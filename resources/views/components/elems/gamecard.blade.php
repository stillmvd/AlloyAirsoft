<div class="relative w-full">
    <a href="{{ route('game', strtolower($game->name)) }}">
        <div class="h-[500px] lg:h-[300px] flex flex-col justify-between relative group ring-2 ring-main rounded-2xl p-6 overflow-hidden z-40">

            <div class="w-full lg:w-min h-min lg:flex flex-row items-end rounded-2xl duration-200 hidden bg-bg lg:bg-dark p-3 xl:group-hover:bg-bg z-40 lg:place-self-end lg:self-start">
                <b class="text-white select-none text-3xl font-medium mr-3 leading-none"> {{ date('g:i', strtotime($game->time))}} </b>
                <p class="text-subwhite select-none font-normal leading-5"> {{ ucfirst(date('a', strtotime($game->time))) }} </p>
            </div>
            <h3 class="w-full lg:w-min h-min text-center text-xl sm:text-3xl rounded-2xl duration-200 whitespace-nowrap bg-bg lg:bg-dark p-3 xl:group-hover:bg-bg z-40 lg:place-self-end lg:self-start"> {{ $game->name }} </h3>

            <div class="w-full h-full lg:h-[300px] bg-bg/50 backdrop-blur-[3px] absolute left-0 top-0 ease-out duration-200 xl:group-hover:backdrop-blur-0 xl:group-hover:bg-transparent z-30"></div>
            <iframe src="{{ $game->linkForIframe }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-[560px] lg:h-[360px] group-hover:scale-[1.2] top-0 lg:-top-10 scale-[1.28] lg:scale-[1.1] ease-out duration-[.2s] absolute z-10"></iframe>
        </div>
    </a>
    @auth
        @if (userIsAdmin(Auth::id()))
            <x-admin.control :game=$game />
        @endif
    @endauth
</div>
{{-- <div class="relative w-full">
    <a href="{{ route('game', strtolower($game->name)) }}">
        <div tabindex="0" class="h-[500px] lg:h-[300px] flex dropdown dropdown-hover flex-col justify-between relative group ring-2 ring-main rounded-2xl p-6 overflow-hidden z-40">

            <div class="z-40 flex flex-row bg-card_bg w-min p-4 items-center rounded-2xl">
                <p class="mr-3 hidden xl:block dropdown-content">
                    {{ __('Operation:') }}
                </p>
                <h3 class="w-full lg:w-min h-min text-3xl sm:text-5xl lg:text-3xl text-center rounded-2xl duration-200 whitespace-nowrap bg-bg lg:bg-dark p-3 xl:group-hover:bg-bg xl:group-hover:ml-24 z-40"> {{ $game->name }} </h3>
            </div>
            <div class="z-40 flex flex-row bg-card_bg w-min p-4 items-center rounded-2xl place-self-end">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" class="w-9 h-9 stroke-subwhite mr-3 dropdown-content hidden xl:block">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>                  
                <h3 class="w-full lg:w-min h-min text-center text-xl sm:text-3xl rounded-2xl duration-200 whitespace-nowrap bg-bg lg:bg-dark p-3 xl:group-hover:bg-bg xl:group-hover:ml-12 z-40 lg:place-self-end lg:self-end"> {{ $game->polygon }} </h3>
            </div>

            <div class="w-full h-full lg:h-[300px] bg-bg/50 backdrop-blur-[3px] absolute left-0 top-0 ease-out duration-200 xl:group-hover:backdrop-blur-0 xl:group-hover:bg-transparent z-30"></div>
            <iframe src="{{ $game->linkForIframe }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-[560px] lg:h-[360px] group-hover:scale-[1.2] top-0 lg:-top-10 scale-[1.28] lg:scale-[1.1] ease-out duration-[.2s] absolute z-10"></iframe>
        </div>
    </a>
    @auth
        @if (userIsAdmin(Auth::id()))
            <x-admin.control :game=$game />
        @endif
    @endauth
</div> --}}