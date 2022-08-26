<header class="relative pt-8 flex flex-row justify-between w-full">
    <a href="{{ route('index') }}" class="text-[2.5rem] text-white font-normal">
        Alloy Airsoft
    </a>
    <div id="menu" class="absolute bg-dark w-min left-0 right-0 mx-auto rounded-full p-2 group cursor-pointer hover:rounded-2xl hover:px-10 ease-out duration-100 z-30" tabindex="0" onclick="openMenu()" onblur="closeMenu()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="w-8 group-hover:scale-[1.2] ease-out duration-100" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </div>
    <div id="links" class="absolute w-[10%] left-0 flex justify-between right-0 mx-auto whitespace-nowrap bottom-[20%] ease-out duration-200 invisible">
        <a href="{{ route('index') }}" class="flex justify-end w-[20%]">
            {{ __('Upcoming') }}
        </a>
        <a href="{{ route('archive') }}" class="flex justify-start w-[20%]">
            {{ __('Archive') }}
        </a>
    </div>
    <div class="flex flex-row items-end">
        <b class="text-5xl mr-3 font-normal">
            {{ now()->format('d') }}
        </b>
        <p class="leading-6">
            {{ now()->format('M') }}
        </p>
    </div>
</header>
<x-elems.separator class="mt-6" />
