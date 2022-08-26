<div class="flex flex-row items-end justify-center my-9">
    <b class="text-5xl mr-3 font-normal">
        {{ date('d', strtotime($game->date)) }}
    </b>
    <p class="leading-6">
        {{ date('M', strtotime($game->date)) }}
    </p>
</div>