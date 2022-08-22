<div class="flex flex-row items-end place-self-end hovered">
    <p class="text-[3rem] text-white font-normal mr-3 leading-none">
        {{ date('g:i', strtotime($game->time))}}
    </p>
    <p class="text-[1.4rem] text-[#CACACA] font-light leading-8">
        {{ ucfirst(date('a', strtotime($game->time))) }}
    </p>
</div>
