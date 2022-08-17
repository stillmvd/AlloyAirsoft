<textarea {{ $attributes->class([
    'w-full box-border text-white text-[1.1rem] px-5 py-3 font-medium rounded-2xl ring-2 ring-[#707070] bg-transparent resize-none placeholder:text-[#5a5a5a]
     focus:outline-none
    '
]) }} id="textarea" cols="30" rows="4">
{{ $slot }}
</textarea>
