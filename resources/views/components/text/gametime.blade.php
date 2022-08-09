<div {{ $attributes->class(
    'flex flex-row'
) }}>
    <p class="text-white text-[3rem] font-light mr-3">
        {{ date('h:s', strtotime($game->playtime)) }}
    </p>
    @if (date('h', strtotime($game->playtime)) < 12)
        <p class="text-white text-[1.2rem] font-light pb-3">
            {{ __('AM') }}
        </p>
        @else
        <p class="text-white text-[1.2rem] font-light pb-3">
            {{ __('PM') }}
        </p>
    @endif
</div>
