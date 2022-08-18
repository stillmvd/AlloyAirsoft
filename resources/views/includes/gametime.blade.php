<p class="text-[1.8rem] text-white font-normal
    desktop:text-[1.6rem]
    laptop:text-[1.5rem]
    tablet-xl:text-[1.4rem]
    tablet:text-[1.3rem]
    phone:text-[1.2rem]
    zero:text-[1.1rem]">
    {{ date('g:i', strtotime($game->time))}}
</p>
<p class="text-[#CACACA] text-[1rem] font-light pl-2
    desktop:text-[1.6rem]
    laptop:text-[1.5rem]
    tablet-xl:text-[1.4rem]
    tablet:text-[1.3rem]
    phone:text-[1.2rem]
    zero:text-[1.1rem]">
    {{ ucfirst(date('a', strtotime($game->time))) }}
</p>
