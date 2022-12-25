<div class="grid grid-flow-col gap-5 text-center auto-cols-max bg-card_bg px-6 py-3 w-auto mx-auto sm:mx-0 justify-center sm:w-min rounded-xl place-self-start self-end z-40">
    <div class="text-white flex flex-col">
      <span class="countdown font-normal flex justify-center text-2xl">
        <span id="days" style="--value:100;"></span>
      </span>
      <p class="select-none leading-none">
        {{ __('days') }}
      </p>
    </div>
    <div class="text-white flex flex-col">
      <span class="countdown font-normal flex justify-center text-2xl">
        <span id="hours" style="--value:100;"></span>
      </span>
      <p class="select-none leading-none">
        {{ __('hours') }}
      </p>
    </div>
    <div class="text-white flex flex-col">
      <span class="countdown font-normal flex justify-center text-2xl">
        <span id="min" style="--value:100;"></span>
      </span>
      <p class="select-none leading-none">
        {{ __('min') }}
      </p>
    </div>
    <div class="text-white flex flex-col">
      <span class="countdown font-normal flex justify-center text-2xl">
        <span id="sec" style="--value:100;"></span>
      </span>
      <p class="select-none leading-none">
        {{ __('sec') }}
      </p>
    </div>
</div>
