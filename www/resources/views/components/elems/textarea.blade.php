<textarea {{ $attributes->class([
    'w-full box-border text-white text-[1.1rem] bg-transparent px-5 py-3 font-medium rounded-xl ring-2 ring-subwhite
    focus:outline-none z-20 placeholder:text-subwhite placeholder:text-base placeholder:font-normal resize-vertical'
]) }} id="textarea" cols="30" rows="4">
{{ $slot }}</textarea>