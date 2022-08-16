<div class="flex flex-row items-end place-self-end">
    <p class="text-[3rem] text-white font-normal mr-3 leading-none">
        {{ $game->time }}
    </p>
    @if (date('h', strtotime($game->time)) < 12)
        <p class="text-[1.4rem] text-[#CACACA] font-light leading-8">
            {{ __('Am') }}
        </p>
        @else
        <p class="text-[1.4rem] text-[#CACACA] font-light leading-8">
            {{ __('Pm') }}
        </p>
    @endif
</div>