<button {{ $attributes->class([
    'text-[#5f5f5f] font-medium text-[1.2rem] opacity-60 rounded-2xl ease-out duration-[.2s] cursor-pointer w-min whitespace-nowrap select-none
     hover:opacity-100
    '
]) }}>
    {{ $slot }}
</button>
