<form {{ $attributes->class([
    'grid grid-cols-2 grid-rows-4 w-[80%] mx-auto
     desktop:w-[80%]
     laptop:w-[100%]
     tablet-xl:grid-cols-2 tablet-xl:grid-rows-4 tablet-xl:w-[100%]
     tablet:grid-cols-1 tablet:grid-rows-7 tablet:gap-6 tablet:w-[90%]
     phone:grid-cols-1 phone:grid-rows-7 phone:gap-6 phone:w-[100%]
     zero:grid-cols-1 zero:grid-rows-7 zero:gap-6 zero:w-[100%]
    '
])->merge([
    'method' => 'post',
]) }}>
    @csrf
    {{ $slot }}
</form>
