<p {{ $attributes->class([
    'text-[1rem] text-white font-normal whitespace-pre-line w-[68%] rounded-3xl h-min ease-out duration-[.2s]
     group-hover:bg-bg group-hover:p-4 group-hover:desktop-xl:w-[80%] group-hover:desktop:w-[100%] group-hover:tablet-xl:w-[100%]
     desktop-xl:text-[1rem] desktop-xl:w-[68%]
     desktop:text-[0.9rem] desktop:w-[80%]
     laptop:text-[0.9rem] laptop:w-[92%]
     tablet-xl:text-[0.7rem] tablet-xl:w-[97%]
     tablet:text-[0.6rem] tablet:w-[100%]
     phone:text-[0.5rem] phone:w-[100%]
     zero:text-[0.4rem] zero:w-[100%]
    '
])->merge([

]) }}> {{ $slot }}
</p>
