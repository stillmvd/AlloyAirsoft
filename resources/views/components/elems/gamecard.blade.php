<x-gamecard.body>
    <x-gamecard.block>
        <x-gamecard.title>
            {{ $game->name }}
        </x-gamecard.title>
    </x-gamecard.block>
    <x-gamecard.block>
        <x-gamecard.time>
            @include('includes.gametime')
        </x-gamecard.time>
    </x-gamecard.block>
    <x-gamecard.block>
        <x-gamecard.info>
            {{ $game->info }}
        </x-gamecard.info>
    </x-gamecard.block>
    <x-gamecard.block>

    </x-gamecard.block>
    
    <x-gamecard.bg />
    <x-elems.map id="map{{ $loop->index }}" />
</x-gamecard.body>