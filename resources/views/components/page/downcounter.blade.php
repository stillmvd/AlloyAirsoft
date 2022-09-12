<div class="m-auto grid grid-flow-col gap-5 text-center items-center justify-center auto-cols-max bg-bg/[.78] px-6 py-3 w-full lg:w-min rounded-2xl absolute bottom-0 lg:left-[2%] lg:bottom-[7%] 2xl:bottom-[10%] z-40">
    <div class="text-white flex flex-col">
      <span class="countdown font-normal text-3xl">
        <span id="days" style="--value:100;"></span>
      </span>
      <p class="select-none">
        {{ __('days') }}
      </p>
    </div>
    <div class="text-white flex flex-col">
      <span class="countdown font-normal text-3xl">
        <span id="hours" style="--value:100;"></span>
      </span>
      <p class="select-none">
        {{ __('hours') }}
      </p>
    </div>
    <div class="text-white flex flex-col">
      <span class="countdown font-normal text-3xl">
        <span id="min" style="--value:100;"></span>
      </span>
      <p class="select-none">
        {{ __('min') }}
      </p>
    </div>
    <div class="text-white flex flex-col">
      <span class="countdown font-normal text-3xl">
        <span id="sec" style="--value:100;"></span>
      </span>
      <p class="select-none">
        {{ __('sec') }}
      </p>
    </div>
</div>
