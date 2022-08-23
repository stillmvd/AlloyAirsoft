<p class="text-[1.8rem] text-white font-normal mr-3
            desktop:text-[1.6rem]
            laptop:text-[1.5rem]
            tablet-xl:text-[1.4rem]
            tablet:text-[1.3rem]
            phone:text-[1.2rem]
            zero:text-[1.1rem]">
    {{ date('g:i', strtotime($game->time))}}
</p>
<p class="text-subwhite font-normal leading-8 
            desktop-xl:text-[1.2rem]
            desktop:text-[1.2rem]
            laptop:text-[1.0rem]
            tablet-xl:text-[0.8rem]
            tablet:text-[0.6rem]
            phone:text-[0.5rem]
            zero:text-[0.4rem]">
    {{ ucfirst(date('a', strtotime($game->time))) }}
</p>
