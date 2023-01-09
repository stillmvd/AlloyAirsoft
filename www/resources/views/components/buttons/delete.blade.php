<input {{ $attributes->class([
    'text-base text-subwhite font-medium leading-none cursor-pointer w-min whitespace-nowrap select-none rounded-xl bg-dark py-3 px-6 absolute right-4 bottom-4'
])->merge([
    'type' => 'submit',
    'value' => 'Delete game',
]) }}>