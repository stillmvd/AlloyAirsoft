@props(['color' => ''])

<div class="w-full bg-[#121212] text-{{ $color }} text-center pt-2">
    {{ $slot }}
</div>
