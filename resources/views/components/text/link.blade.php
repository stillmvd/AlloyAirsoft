<a {{ $attributes->class(
    'desktop-xl:text-lg
     desktop:text-lg
     laptop:text-lg
     tablet-xl:text-lg
     tablet:text-lg
     phone:text-lg
     zero:text-lg'
)->merge([
    'href' => '',
]) }}>{{ $slot }}</a>