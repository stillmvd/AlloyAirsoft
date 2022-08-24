<header class="pt-[2%]">
    <div class="flex flex-col">
        <div class="flex flex-row justify-between">
            <div class="flex items-center w-[20%]">
                <a href="{{ route('index') }}" class="text-[2.5rem] text-white font-normal">
                    Alloy Airsoft
                </a>
            </div>
            <div class="flex items-end">
                <x-text.headerLink href="{{ route('index') }}" class="font-normal mr-4  ease-out duration-[.2s] {{ Route::is('index') ? '
                desktop-xl:text-[2.5rem]
                desktop:text-[2.4rem]
                laptop:text-[2.3rem]
                tablet-xl:text-[2.0rem]
                tablet:text-[1.4rem]
                phone:text-[1.0rem]
                zero:text-[1.0rem]
                hover:pb-0 text-white font-normal' : '
                desktop-xl:text-[1.2rem]
                desktop:text-[1.2rem]
                laptop:text-[1.0rem]
                tablet-xl:text-[0.8rem]
                tablet:text-[0.6rem]
                phone:text-[0.5rem]
                pb-2 hover:pb-0 hover:text-white text-subwhite' }}">
                    {{ __('Upcoming') }}
                </x-text.link>
                <x-text.headerLink href="{{ route('archive') }}" class="font-normal ml-4 ease-out duration-[.2s] {{ Route::is('archive') ? '
                desktop-xl:text-[2.5rem]
                desktop:text-[2.4rem]
                laptop:text-[2.3rem]
                tablet-xl:text-[2.0rem]
                tablet:text-[1.4rem]
                phone:text-[1.0rem]
                zero:text-[1.0rem]
                hover:pb-0 text-white font-normal' : '
                desktop-xl:text-[1.2rem]
                desktop:text-[1.2rem]
                laptop:text-[1.0rem]
                tablet-xl:text-[0.8rem]
                tablet:text-[0.6rem]
                phone:text-[0.5rem]
                pb-2 hover:pb-0 hover:text-white text-subwhite' }}">
                    {{ __('Archive') }}
                </x-text.link>
            </div>
            <div class="flex items-center w-[20%] justify-end">
                <x-text.date/>
            </div>
        </div>
        <div class="h-[2px] mt-3 w-full bg-[#242424]">

        </div>
    </div>
</header>
