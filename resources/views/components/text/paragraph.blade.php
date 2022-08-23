<p {{ $attributes->class([
    'zero:text-xl
     phone:text-lg
     tablet:text-lg
     tablet-xl:text-lg
     laptop:text-lg
     desktop:text-lg
     desktop-xl:text-lg'
])->merge([
    'class' => ''
]) }}>{{ $slot }}</p>