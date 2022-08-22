<div class="m-auto grid grid-flow-col gap-5 text-center ring-2 ring-addictive auto-cols-max justify-center bg-addictive/500 backdrop-blur-[6px] p-6 w-min rounded-2xl mt-10 absolute left-[2%] top-[32%] text-white">
    <div class="text-subwhite flex flex-col">
      <span class="countdown font-mono text-5xl">
        <span id="days" style="--value:100;"></span>
      </span>
      {{ __('days') }}
    </div>
    <div class="text-subwhite flex flex-col">
      <span class="countdown font-mono text-5xl">
        <span id="hours" style="--value:100;"></span>
      </span>
      {{ __('hours') }}
    </div>
    <div class="text-subwhite flex flex-col">
      <span class="countdown font-mono text-5xl">
        <span id="min" style="--value:100;"></span>
      </span>
      {{ __('min') }}
    </div>
    <div class="text-subwhite flex flex-col">
      <span class="countdown font-mono text-5xl">
        <span id="sec" style="--value:100;"></span>
      </span>
      {{ __('sec') }}
    </div>
</div>
