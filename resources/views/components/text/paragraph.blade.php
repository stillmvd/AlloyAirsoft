<p {{ $attributes->class(
    'text-[#CACACA] font-light leading-none
     phone:text-sm 
     tablet:text-sm 
     tablet-xl:text-sm 
     laptop:text-base 
     desktop:text-base 
     desktop-xl:text-[1rem]
    '
) }}>
    {{ $slot }}
</p>
