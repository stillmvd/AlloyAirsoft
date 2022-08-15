<form action="{{ route('changeInputs', ['count' => $count]) }}" {{ $attributes->class([
    'grid grid-cols-2 gap-6 w-[30%]'
])->merge([
    'method' => 'POST',
]) }}>
    @csrf
    {{ $slot }}
</form>