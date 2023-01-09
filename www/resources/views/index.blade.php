@extends('layouts.base')

@section('content')
    <main class="grow">
        @if ($games->where('finished', '=', 0)->count() != 0)
            <h2 class="my-10">
                {{ __('Nearby events') }}
            </h2>
            <div class="flex flex-col gap-y-16">
                @foreach ($games as $game)
                    @if ($game->finished == 0)
                        <div class="hidden">
                            <p id="map-counter">{{ $games_count }}</p>
                        </div>
                        <x-elems.gamecard :loop=$loop :game=$game />
                    @endif
                @endforeach
            </div>
        @endif
        <h2 class="my-10">
            {{ __('Finished events') }}
        </h2>
        <div class="flex flex-col gap-y-16">
            @foreach ($games as $game)
                @if (! $game->finished == 0)
                    <div class="hidden">
                        <p id="map-counter">{{ $games_count }}</p>
                    </div>
                    <x-elems.gamecard :loop=$loop :game=$game />
                @endif
            @endforeach
        </div>
    </main>
@endsection
