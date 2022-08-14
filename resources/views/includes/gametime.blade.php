<p class="text-[1.8rem] text-white font-normal">
    {{ date('h:s', strtotime($game->playtime)) }}
</p>
@if (date('h', strtotime($game->playtime)) < 12)
    <p class="text-[#CACACA] text-[1rem] font-light ml-2 pb-1">
        {{ __('AM') }}
    </p>
    @else
    <p class="text-[#CACACA] text-[1rem] font-light ml-2 pb-1">
        {{ __('PM') }}
    </p>
@endif