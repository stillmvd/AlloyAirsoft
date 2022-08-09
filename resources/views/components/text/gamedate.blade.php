<div class="flex flex-row items-end">
    <p class="text-white text-[3rem] font-light mr-3">
        {{ date('d', strtotime($game->date)) }}
    </p>
    <p class="text-white text-[1.2rem] font-light pb-3">
        {{ date('M', strtotime($game->date)) }}
    </p>
</div>