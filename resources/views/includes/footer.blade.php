<footer class="py-10">
    <x-pages.container>
        <div class="h-[2px] mt-10 mb-10 w-full bg-[#242424]"></div>
        <div class="flex flex-row justify-between">
            <div class="flex flex-col">
                <x-text.subtitle class="text-white font-light mb-8">
                    {{ __('Contacts') }}
                </x-text.subtitle>
                <x-text.paragraph class="text-[#CACACA] font-light my-2">
                    glebka@gmail.com
                </x-text.paragraph>
                <x-text.paragraph class="text-[#CACACA] font-light mt-2">
                    +1 245 586 54 13
                </x-text.paragraph>
            </div>
            <div class="w-1/4 flex flex-col items-end">
                <x-text.subtitle class="text-white font-light mb-8">
                    {{ __('Subscribe to our updates') }}
                </x-text.subtitle>
                <form action="{{ route('save_email') }}" method="POST" class="w-full flex flex-col h-full justify-end">
                    @csrf
                    <div class="flex flex-col w-full relative">
                        <div class="flex flex-row">
                            <input type="email" name="email" placeholder="Email" class="bg-transparent border-b-2 w-full focus:outline-none text-white pb-1">
                            <input type="submit" class="bg-transparent border-b-2 focus:outline-none text-white pb-2 w-min cursor-pointer" value="→">
                        </div>
                        @if (session()->get('error'))
                            <label for="email" class="bg-red-500 py-2 w-full text-white text-sm mt-4 font-light rounded flex text-center items-center justify-center absolute top-[-60px] slide-card">
                                {{ session()->get('error') }}
                            </label>
                        @endif --}}
                    </div>
                </form>
            </div>
        </div>
    </x-pages.container>
</footer>
