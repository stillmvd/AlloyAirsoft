<header class="py-4">
    <x-pages.container class="flex flex-row justify-between">
        <a href="" class="w-[5%]">
            <img src="{{ asset('image/logo.png') }}" alt="" class="max-w-full">
        </a>
        <nav class="w-[30%] flex justify-between items-center">
            <x-text.link>
                {{ __('Игры и операции') }}
            </x-text.link>
            <x-text.link>
                {{ __('Правила') }}
            </x-text.link>
            <x-text.link>
                {{ __('Регистрация') }}
            </x-text.link>
        </nav>
    </x-pages.container>
</header>