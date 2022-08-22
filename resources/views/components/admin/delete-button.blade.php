<input {{ $attributes->class([
    'text-subwhite font-medium text-[1.2rem] opacity-60 rounded-2xl ease-out duration-[.2s] cursor-pointer w-min whitespace-nowrap select-none
     hover:opacity-100
    '
])->merge([
    'type' => 'submit',
    'value' => 'Delete',
]) }}>