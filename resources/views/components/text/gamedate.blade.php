<div class="flex flex-row items-end place-self-center hovered">
    <p class="text-[3rem] text-white font-normal mr-3 leading-none">
        {{ date('d', strtotime($game->date)) }}
    </p>
    <p class="text-[1.4rem] text-[#CACACA] font-light leading-8">
        {{ date('M', strtotime($game->date)) }}
    </p>
</div>
