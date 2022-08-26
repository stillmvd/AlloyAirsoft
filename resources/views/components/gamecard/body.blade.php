<a {{ $attributes->class([
    'w-full h-[300px] grid grid-cols-2 grid-rows-2 ring-2 ring-main rounded-3xl p-6 cursor-pointer relative overflow-hidden group z-20
     laptop:h-[270px]
     tablet-xl:h-[250px]
     tablet:h-[230px]
     phone:h-[210px]
     zero:h-[200px]'
])->merge([

]) }}>
    {{ $slot }}
</a>
