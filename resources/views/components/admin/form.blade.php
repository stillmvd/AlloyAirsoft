<form {{ $attributes->class([
    'flex flex-col gap-y-6'
])->merge([
    'method' => 'POST',
]) }}>
    @csrf
    {{ $slot }}
</form>