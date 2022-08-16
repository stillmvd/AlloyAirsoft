<form action="{{ route('create', ['game_id' => 1001]) }}" {{ $attributes->class([
    'flex flex-col gap-y-6'
])->merge([
    'method' => 'POST',
]) }}>
    @csrf
    {{ $slot }}
</form>
