<header class="pt-[3%]">
    <x-pages.container class="flex flex-col">
        <div class="flex flex-row justify-between">
            <div class="flex items-center">
                <x-text.link href="{{ route('home') }}" class="mr-9 font-light hover:text-[3rem] ease-out duration-75 {{ Route::is('home') ? 'text-[3rem]' : 'text-[1.2rem]' }}">
                    {{ __('Current') }}
                </x-text.link>
                <x-text.link href="{{ route('archive') }}" class="mr-9 font-light hover:text-[3rem] ease-out duration-75 {{ Route::is('archive') ? 'text-[3rem]' : 'text-[1.2rem]' }}">
                    {{ __('Archive') }}
                </x-text.link>
                <x-text.link href="{{ route('info') }}" class="mr-9 font-light hover:text-[3rem] ease-out duration-75 {{ Route::is('info') ? 'text-[3rem]' : 'text-[1.2rem]' }}">
                    {{ __('Info') }}
                </x-text.link>
            </div>
            <div class="flex items-center">
                <x-text.link class="text-[1.2rem] font-light">
                    {{ __('Logo') }}
                </x-text.link>
            </div>
        </div>
        <hr class="w-full mt-4 border-[1px] bg-white/25 border-white/25">
    </x-pages.container>
</header>