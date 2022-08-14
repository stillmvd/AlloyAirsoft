<form {{ $attributes->class([
    'grid grid-cols-2 grid-rows-4 w-[80%] mx-auto
     tablet-xl:grid-cols-2 tablet-xl:grid-rows-4
     tablet:grid-cols-1 tablet:grid-rows-7 tablet:gap-6
     phone:grid-cols-1 phone:grid-rows-7 phone:gap-6
     zero:grid-cols-1 zero:grid-rows-7 zero:gap-6
    '
])->merge([
    'method' => 'post',
]) }}>
    @csrf
    {{ $slot }}
</form>