@props(['color' => ''])

<div class="w-full bg-[#121212] text-center pt-2 text-{{ $color }}">
    {{ $slot }}
</div>
