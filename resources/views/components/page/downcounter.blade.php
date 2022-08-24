<div class="m-auto grid grid-flow-col gap-5 text-center ring-2 ring-addictive auto-cols-max justify-center bg-transparent backdrop-blur-[6px] px-6 py-3 w-min rounded-2xl absolute left-[2%] top-[38%]">
    <div class="text-white flex flex-col">
      <span class="countdown font-normal text-4xl">
        <span id="days" style="--value:100;"></span>
      </span>
      <p>
        {{ __('days') }}
      </p>
    </div>
    <div class="text-white flex flex-col">
      <span class="countdown font-normal text-4xl">
        <span id="hours" style="--value:100;"></span>
      </span>
      <p>
        {{ __('hours') }}
      </p>
    </div>
    <div class="text-white flex flex-col">
      <span class="countdown font-normal text-4xl">
        <span id="min" style="--value:100;"></span>
      </span>
      <p>
        {{ __('min') }}
      </p>
    </div>
    <div class="text-white flex flex-col">
      <span class="countdown font-normal text-4xl">
        <span id="sec" style="--value:100;"></span>
      </span>
      <p>
        {{ __('sec') }}
      </p>
    </div>
</div>
