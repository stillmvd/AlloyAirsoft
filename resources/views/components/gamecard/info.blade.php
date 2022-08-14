<p {{ $attributes->class([
    'text-[1rem] text-[#CACACA] font-light whitespace-pre-line rounded-3xl w-[68%] h-min ease-out duration-[.2s]
     group-hover:bg-[#111111] group-hover:p-4
    '
])->merge([

]) }}> {{ $slot }}
</p>