<header class="pt-[2%]">
    <div class="flex flex-col">
        <div class="flex flex-row justify-between">
            <div class="flex items-center w-[20%]">
                <a href="{{ route('index') }}" class="text-[2.5rem] text-white font-normal">
                    Alloy Airsoft
                </a>
            </div>
            <div class="w-[24%] flex justify-between items-end">
                <a href="{{ route('index') }}" class="{{ Route::is('index') ? 'text-5xl font-normal' : 'text-2xl font-light text-subwhite' }} ">
                    {{ __('Upcoming') }}
                </a>
                <a href="{{ route('archive') }}" class="{{ Route::is('archive') ? 'text-5xl font-normal' : 'text-2xl font-light text-subwhite' }}">
                    {{ __('Archive') }}
                </a>
            </div>
            <div class="flex items-center w-[20%] justify-end">
                <div class="flex flex-row items-end hovered">
                    <b class="text-5xl mr-3 font-normal">
                        {{ now()->format('d') }}
                    </b>
                    <p class="leading-6">
                        {{ now()->format('M') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="h-[2px] mt-3 w-full bg-[#242424]">

        </div>
    </div>
</header>
