<header class="pt-[2%]">
    <x-pages.container class="flex flex-col">
        <div class="flex flex-row justify-between">
            <div class="flex items-center w-[20%]">
                <x-text.link href="{{ route('index') }}" class="text-[1.2rem] text-gray-200/75 font-light hover:text-[2.5rem] hover:text-white ease-out duration-[.2s]">
                    {{ __('To site') }}
                </x-text.link>
            </div>
            <div class="flex items-end">
                <x-text.link href="{{ route('admin') }}" class="font-light mr-4 hover:text-[2.5rem] ease-out duration-[.2s] {{ Route::is('admin') ? 'text-[2.5rem] hover:pb-0 text-white' : 'text-[1.2rem] pb-2 hover:pb-0 hover:text-white text-gray-200/75' }}">
                    {{ __('Control') }}
                </x-text.link>
                <x-text.link href="{{ route('players') }}" class="font-light ml-4 hover:text-[2.5rem] ease-out duration-[.2s] {{ Route::is('players') ? 'text-[2.5rem] hover:pb-0 text-white' : 'text-[1.2rem] pb-2 hover:pb-0 hover:text-white text-gray-200/75' }}">
                    {{ __('Players') }}
                </x-text.link>
            </div>
            <div class="flex items-center w-[20%] justify-end">
                <x-text.link href="{{ route('logout') }}" class="text-[1.2rem] text-gray-200/75 font-light hover:text-[2.5rem] hover:text-white ease-out duration-[.2s]">
                    Logout
                </x-text.link>
            </div>
        </div>
        <div class="h-[2px] mt-3 w-full bg-[#242424]">

        </div>
    </x-pages.container>
</header>