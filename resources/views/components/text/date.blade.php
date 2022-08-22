<div class="flex flex-row items-end hovered">
    <p class="text-white font-normal mr-3
                desktop-xl:text-[2.5rem]
                desktop:text-[2.4rem]
                laptop:text-[2.3rem]
                tablet-xl:text-[2.0rem]
                tablet:text-[1.7rem]
                phone:text-[1.4rem]
                zero:text-[1.0rem]">
        {{ now()->format('d') }}
    </p>
    <p class="text-subwhite font-light leading-10
                desktop-xl:text-[1.2rem]
                desktop:text-[1.2rem]
                laptop:text-[1.0rem]
                tablet-xl:text-[0.8rem]
                tablet:text-[0.6rem]
                phone:text-[0.5rem]
                zero:text-[0.4rem]">
        {{ now()->format('M') }}
    </p>
</div>
