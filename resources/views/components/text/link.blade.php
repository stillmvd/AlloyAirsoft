<a {{ $attributes->class(
    'bg-slate-200 px-4 py-2 rounded-xl hover:bg-slate-200/50 whitespace-nowrap'
)->merge([
    'href' => '',
]) }}>
    {{ $slot }}
</a>