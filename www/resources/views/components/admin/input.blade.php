<input {{ $attributes->class([
    'w-full box-border text-white text-[1.1rem] bg-transparent px-5 h-14 font-medium rounded-xl ring-2 ring-subwhite
    focus:outline-none z-20 placeholder:text-subwhite placeholder:text-base placeholder:font-normal'
])->merge([
    'autocapitalize' => 'none',
    'spellcheck' => 'false',
]) }}>
