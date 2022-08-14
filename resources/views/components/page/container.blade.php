<div {{ $attributes->class(
    'mx-auto
     desktop-2xl:w-[80%]
     desktop:w-[80%] 
     laptop:w-[80%] 
     tablet-md:w-[80%] 
     tablet:w-[80%] 
     phone:w-[90%]
     zero:w-[90%]
    '
) }}>
    {{ $slot }}
</div>
