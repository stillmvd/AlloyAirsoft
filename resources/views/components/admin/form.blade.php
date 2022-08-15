<form action="{{ route('create', ['count' => $count, 'game_id' => 1001]) }}" {{ $attributes->class([
    'grid grid-rows-auto grid-cols-1 gap-y-6'
])->merge([
    'method' => 'POST',
]) }}>
    @csrf
    {{ $slot }}
</form>