<footer class="mt-20 mb-10">
    <x-elems.separator class="mb-6" />
    <div class="grid grid-cols-2 laptop:grid-cols-2 tablet-xl:grid-cols-1 zero:grid-cols-1">
        <div class="flex flex-col laptop:justify-start laptop:items-start tablet-xl:justify-center tablet-xl:items-center zero:justify-center zero:items-center">
            <h3 class="mb-10">
                {{ __('Contacts') }}
            </h3>
            <div class="flex flex-row items-center pl-6 w-min rounded-2xl bg-card_bg group hover:bg-main ease-out duration-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="w-8 mr-4 group-hover:fill-dark" viewBox="0 0 16 16">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                </svg>
                <b class="whitespace-nowrap font-semibold text-dark bg-main p-6 rounded-2xl group-hover:bg-card_bg group-hover:text-white group-hover:scale-90 ease-out duration-100">
                    {{ $phone }}
                </b>
            </div>
            <div class="flex flex-row items-center pl-6 mt-6 w-min rounded-2xl bg-card_bg group hover:bg-main ease-out duration-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="w-8 mr-4 group-hover:fill-dark" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                </svg>
                <b class="whitespace-nowrap font-semibold text-dark bg-main p-6 rounded-2xl group-hover:bg-card_bg group-hover:text-white group-hover:scale-90 ease-out duration-100">
                    {{ $email }}
                </b>
            </div>
        </div>

        <div class="flex flex-col laptop:justify-start laptop:items-start laptop:mt-0 tablet-xl:justify-center tablet-xl:items-center tablet-xl:mt-16 zero:justify-center zero:items-center zero:mt-16">
            <h3 class="mb-10 tablet-xl:text-center zero:text-center whitespace-nowrap tablet:whitespace-nowrap phone:whitespace-normal zero:whitespace-normal">
                {{ __('Get emails about our new games') }}
            </h3>
            <form action="{{ route('save_email') }}" method="POST" class="w-full flex flex-col laptop:items-start tablet-xl:items-center zero:items-center">
                @csrf
                <div class="flex flex-row items-center pl-6 rounded-2xl bg-card_bg group hover:bg-main ease-out duration-300 cursor-pointer desktop-xl:w-[54%] tablet-xl:w-[70%] laptop:w-[80%]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="w-8 mr-4 group-hover:fill-dark" viewBox="0 0 16 16">
                        <path d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2H4Zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6v-2.55Zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v5.417Zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267v2.55Zm13 .566v5.734l-4.778-2.867L15 7.383Zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083l6.965 4.18ZM1 13.116V7.383l4.778 2.867L1 13.117Z"/>
                    </svg>
                    <input type="text" name="email" placeholder="Your email" value="{{ old('email') }}" class="grow font-semibold bg-main placeholder:text-dark placeholder:font-semibold px-6 py-5 rounded-2xl ease-out duration-100 @error('email') bg-red text-white @enderror
                    focus:outline-none group-hover:bg-card_bg group-hover:placeholder:text-white group-hover:scale-90 focus:scale-90 hover:text-white">
                </div>
                @error('email')
                    <b class="p-6 mt-6 rounded-2xl bg-card_bg text-red font-medium flex flex-row items-center whitespace-nowrap tablet-xl:whitespace-nowrap zero:whitespace-normal">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                        </svg>
                        The email must be a valid email address
                    </b>
                @enderror
                <input required type="submit" value="{{ __('Subscribe') }}" class="mt-6 font-bold text-base text-white rounded-2xl px-6 py-4 bg-transparent ring-main ring-2 cursor-pointer ease-out duration-200 desktop-xl:w-[58%] tablet-xl:w-[74%] tablet:w-[50%] zero:w-[80%]
                group-hover:bg-card_bg group-hover:text-white group-hover:scale-90 hover:ring-2 hover:ring-transparent hover:bg-main hover:text-dark">
            </form>
        </div>
    </div>
</footer>
