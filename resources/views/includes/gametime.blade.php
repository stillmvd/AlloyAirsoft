<p class="text-[1.8rem] text-white font-normal">
    {{ date('h:s', strtotime($game->time)) }}
</p>
@if (date('h', strtotime($game->time)) < 12)
    <p class="text-[#CACACA] text-[1rem] font-light ml-2 pb-1">
        {{ __('Am') }}
    </p>
    @else
    <p class="text-[#CACACA] text-[1rem] font-light ml-2 pb-1">
        {{ __('Pm') }}
    </p>
@endif