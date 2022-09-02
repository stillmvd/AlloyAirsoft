<div class="relative">
    <a href="{{ route('game', $game->id) }}">
        <div class="h-[300px] relative group ring-2 ring-main rounded-2xl p-6 grid grid-cols-2 grid-rows-2 overflow-hidden z-40">
            
            <h3 class="w-min h-min rounded-2xl ease-out duration-200 whitespace-nowrap bg-[#A99D73]/[.18] p-4 group-hover:bg-bg group-hover:p-6 z-40"> {{ $game->name }} </h3>
            <div class="w-min h-min flex flex-row items-end rounded-2xl ease-out duration-200 bg-[#A99D73]/[.18] p-4 group-hover:bg-bg group-hover:p-6 z-40 place-self-end self-start">
                <b class="text-white text-3xl font-medium mr-3 leading-none"> {{ date('g:i', strtotime($game->time))}} </b>
                <p class="text-subwhite font-normal leading-5"> {{ ucfirst(date('a', strtotime($game->time))) }} </p>
            </div>
            <p class="w-min rounded-2xl ease-out duration-200 whitespace-pre bg-[#A99D73]/[.18] p-4 group-hover:bg-bg group-hover:p-6 z-40 place-self-start self-end">{{ $game->info }} </p>
            <h3 class="w-min h-min rounded-2xl ease-out duration-200 whitespace-nowrap bg-[#A99D73]/[.18] p-4 group-hover:bg-bg group-hover:p-6 z-40 place-self-end self-end"> {{ $game->polygon }} </h3>
            
            <div class="w-full h-[300px] bg-bg/50 backdrop-blur-[3px] absolute ease-out duration-200 group-hover:backdrop-blur-0 group-hover:bg-transparent z-30"></div>
            <x-elems.map class="group-hover:scale-[1.2]" id="map{{ $loop->index }}" />

        </div>
    </a>
    <x-admin.control :game=$game />
</div>