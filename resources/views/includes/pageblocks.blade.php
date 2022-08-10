<div class="grid grid-cols-2 gap-20">
    <div class="w-full h-[200px] p-6 mt-20 group ease duration-200 hover:bg-[#303030]/25 bg-[#303030]/50 rounded-3xl overflow-hidden" id="infoblock">
        <div class="flex flex-row justify-between">
            <x-text.title class="text-white/25 group-hover:text-white duration-[.1s] ease-out font-light">
                {{ __('About us') }}
            </x-text.title>
            <img src="{{ asset('image/arrows.svg') }}" alt="arrows" class="cursor-pointer w-[4%] h-min" onclick="openinfo()" id="arrows">
        </div>
        <div class="mt-3">
            <x-text.subtitle class="text-white/75 ease duration-75" id="titleinfo">
                Mercenaries!
            </x-text.subtitle>
            <x-text.paragraph class="text-white/50 font-light whitespace-normal truncate w-[70%] h-[70px] ease duration-100" id="textinfo">
                Our company is extremely interested in renting your services for identification signals on territory hostile to us with a large group of unidentified armed individuals involved in activities and for information about which we of course we will pay you.
            </x-text.paragraph>
            <x-text.paragraph class="text-white/50 font-light mt-6" id="undertext">
                “Colleagues”, do with them at your own discretion, no fines or rewards for You don't have to remove them. To clarify one point, we cannot transfer a group of more than 11 people, so Choose your best fighters and equip as you see fit.  Take with you everything you need, because due to high risks we are not ready to transfer supplies to this territory.
            </x-text.paragraph>
        </div>
    </div>
    <div class="w-full h-[200px] p-6 mt-20 group hover:bg-[#303030]/25 duration-[.1s] ease-out bg-[#303030]/50 rounded-3xl flex flex-col justify-between">
        <x-text.title class="text-white/25 group-hover:text-white duration-[.1s] ease-out font-light">
            {{ __('Log in') }}
        </x-text.title>
        <form action="" class="flex flex-col w-[40%] overflow-hidden box-border">
            <input type="text" placeholder="login" class="py-2 px-4 font-light text-white placeholder-text-white/50 placeholder-font-light focus:outline-none border-2 border-amber-500/50 bg-transparent rounded-xl my-3">
            <input type="text" placeholder="password" class="py-2 px-4 font-light text-white placeholder-text-white/50 placeholder-font-light focus:outline-none border-2 border-amber-500/50 bg-transparent rounded-xl my-3">
            <input type="submit" class="py-2 px-4 font-light text-white focus:otutline-none ring-2 ring-white/75 bg-transparent rounded-xl my-6">
        </form>
    </div>
</div>