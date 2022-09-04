<textarea {{ $attributes->class([
    'w-full box-border text-white text-[1.1rem] px-5 py-3 font-medium rounded-xl ring-2 ring-subwhite bg-transparent resize-vertical placeholder:text-[#595959] placeholder:text-base
     focus:outline-none'
]) }} id="textarea" cols="30" rows="4">
{{ $slot }}</textarea>