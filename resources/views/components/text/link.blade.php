<a {{ $attributes->class(
    'hover:desktop-xl:text-[2.5rem] hover:desktop:text-[2.4rem] hover:laptop:text-[2.3rem] hover:tablet-xl:text-[2.0rem] hover:tablet:text-[1.4rem] hover:phone:text-[1.0rem] hover:zero:text-[1.0rem]'
)->merge([
    'href' => '',
]) }}>
    {{ $slot }}
</a>
