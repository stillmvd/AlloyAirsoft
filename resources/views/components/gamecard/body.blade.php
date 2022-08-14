<a {{ $attributes->class([
    'w-full h-[300px] grid grid-cols-2 grid-rows-2 ring-2 ring-[#CACACA] rounded-3xl p-6 cursor-pointer relative overflow-hidden group'
])->merge([
    'href' => '',
]) }}>
    {{ $slot }}
</a>