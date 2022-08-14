<p {{ $attributes->class([
    'text-[1.8rem] text-white font-normal rounded-3xl h-min ease-out duration-[.2s]
     group-hover:bg-[#111111] group-hover:p-4
    '
])->merge([

]) }}>
    {{ $slot }}
</p>