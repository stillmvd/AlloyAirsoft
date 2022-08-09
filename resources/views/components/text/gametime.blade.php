<div class="flex flex-row items-end">
    <p class="text-white text-[3rem] font-light mr-3">
        {{ date('h:s', strtotime($game->playtime)) }}
    </p>
    <p class="text-white text-[1.2rem] font-light pb-3">
        {{ __('AM') }}
    </p>
</div>
