<x-gamecard.body href="{{ route('game', $game->id) }}">
    <x-gamecard.block>
        <x-gamecard.title>
            {{ $game->name }}
        </x-gamecard.title>
    </x-gamecard.block>
    <x-gamecard.block class="justify-end">
        <x-gamecard.time>
            @include('includes.gametime')
        </x-gamecard.time>
    </x-gamecard.block>
    <x-gamecard.block class="items-end">
        <x-gamecard.info>
            {{ $game->info }}
        </x-gamecard.info>
    </x-gamecard.block>
    <x-gamecard.block class="justify-end items-end">
        <x-gamecard.polygon>
            {{ $game->polygon }}
        </x-gamecard.polygon>
    </x-gamecard.block>
    
    <x-gamecard.bg />
    <x-elems.map id="map{{ $loop->index }}" />
</x-gamecard.body>