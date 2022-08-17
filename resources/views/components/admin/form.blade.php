@props(['id' => ''])

<form action="{{ route('update', ['id' => $id]) }}" {{ $attributes->class([
    'flex flex-col gap-y-6'
]) }}>
    @csrf
    {{ method_field('put') }}
    {{ $slot }}
</form>
