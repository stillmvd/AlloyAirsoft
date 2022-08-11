<div class="flex flex-row items-end">
    <x-text.title>
        {{ date('h:s', strtotime($game->playtime)) }}
    </x-text.title>
    @if (date('h', strtotime($game->playtime)) < 12)
        <p class="text-white text-[1rem] font-light ml-3">
            {{ __('AM') }}
        </p>
        @else
        <p class="text-white text-[1rem] font-light ml-3">
            {{ __('PM') }}
        </p>
    @endif
</div>