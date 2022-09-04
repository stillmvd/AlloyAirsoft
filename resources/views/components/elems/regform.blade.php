<form {{ $attributes->class([
    'grid grid-cols-2 grid-rows-4 gap-6 w-[80%] mx-auto'
])->merge([
    'method' => 'post',
]) }}>
    @csrf
    {{ $slot }}
</form>
