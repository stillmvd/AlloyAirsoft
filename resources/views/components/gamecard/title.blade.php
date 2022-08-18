<p {{ $attributes->class([
    'text-[1.8rem] text-white font-normal rounded-3xl h-min ease-out duration-[.2s]
     group-hover:bg-[#111111] group-hover:p-4
     desktop:text-[1.6rem]
     laptop:text-[1.5rem]
     tablet-xl:text-[1.4rem]
     tablet:text-[1.3rem]
     phone:text-[1.2rem]
     zero:text-[1.1rem]
    '
])->merge([

]) }}>
    {{ $slot }}
</p>
