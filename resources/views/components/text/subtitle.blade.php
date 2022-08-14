<p {{ $attributes->class(
    'text-white font-light
     phone:text-base 
     tablet:text-base 
     tablet-xl:text-base 
     laptop:text-lg 
     desktop:text-xl 
     desktop-xl:text-2xl 
    '
) }}>
    {{ $slot }}
</p>