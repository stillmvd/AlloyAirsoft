<header class="pt-[2%]">
    <x-pages.container class="flex flex-col">
        <div class="flex flex-row justify-between">
            <div class="flex items-center w-[20%]">
                <x-text.link href="{{ route('index') }}" class="text-[1.2rem] text-white font-light">
                    {{ __('Logo') }}
                </x-text.link>
            </div>
            <div class="flex items-end">
                <x-text.link href="{{ route('index') }}" class="font-light mr-4 hover:text-[2.5rem] ease-out duration-[.2s] {{ Route::is('index') ? 'text-[2.5rem] hover:pb-0 text-white' : 'text-[1.2rem] pb-2 hover:pb-0 hover:text-white text-gray-200/75' }}">
                    {{ __('Upcoming') }}
                </x-text.link>
                <x-text.link href="{{ route('archive') }}" class="font-light ml-4 hover:text-[2.5rem] ease-out duration-[.2s] {{ Route::is('archive') ? 'text-[2.5rem] hover:pb-0 text-white' : 'text-[1.2rem] pb-2 hover:pb-0 hover:text-white text-gray-200/75' }}">
                    {{ __('Archive') }}
                </x-text.link>
            </div>
            <div class="flex items-center w-[20%] justify-end">
                <x-text.date/>
            </div>
        </div>
        <div class="h-[2px] mt-3 w-full bg-[#242424]">

        </div>
    </x-pages.container>
</header>