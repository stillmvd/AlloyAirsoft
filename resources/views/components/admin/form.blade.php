@props(['id' => ''])

<form {{ $attributes->class([
    'flex flex-col gap-y-6'
]) }}>
    @csrf
    {{ method_field('put') }}
    {{ $slot }}
</form>
