<div class="relative w-full">
    <a href="{{ route('game', strtolower($game->name)) }}">
        <div id="gamecard" class="h-full lg:h-[300px] flex flex-col lg:flex-row lg:justify-between relative group rounded-2xl duration-200 p-2 overflow-hidden z-40">
            <h3 class="w-full lg:w-min h-min text-3xl sm:text-5xl lg:text-3xl text-center rounded-2xl duration-200 whitespace-nowrap bg-bg lg:bg-bg/[.78] p-3 xl:group-hover:bg-bg z-40"> {{ $game->name }} </h3>
            <h3 class="w-full lg:w-min h-min text-center text-xl sm:text-3xl rounded-2xl duration-200 whitespace-nowrap bg-bg lg:bg-bg/[.78] p-3 xl:group-hover:bg-bg z-40 lg:place-self-end lg:self-end"> {{ $game->polygon }} </h3>

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