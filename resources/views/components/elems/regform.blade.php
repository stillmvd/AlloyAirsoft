<form {{ $attributes->class([
    'lg:grid grid-cols-2 grid-rows-4 gap-6 lg:w-[80%] mx-auto',
    'w-full flex flex-col gap-y-6'
])->merge([
    'method' => 'post',
]) }}>
    @csrf
    {{ $slot }}
</form>
