<div {{ $attributes->class([
    'flex justify-between
     laptop:flex-row 
     tablet-xl:flex-col 
     tablet:flex-col 
     phone:flex-col 
     zero:flex-col'
]) }}>
    {{ $slot }}
</div>
