@extends('layouts.base')

@section('title', 'Create team')

@section('content')
<form action="{{ route('storeTeam', ['id' => Auth::user()->id ]) }}" method="POST" class="flex flex-col gap-y-6 w-full md:w-[70%] lg:w-[60%] xl:w-[50%] 2xl:w-[40%] mx-auto">
    @csrf
    <div class="my-10">
        <h3 class="text-addictive">
            {{ __('Create team') }}
        </h3>
        <div class="grid grid-rows-3 gap-5 pt-5">
            <input required class="w-full box-border text-white text-[1.1rem] px-5 py-3 font-medium rounded-xl ring-2 ring-subwhite placeholder:text-[#595959] placeholder:text-base first-letter:focus:outline-none out-of-range:ring-red placeholder:select-none bg-transparent" name="name" type="text">
            @error('name')
                <b class="px-6 py-2 w-min absolute z-30 -bottom-[40%] -right-[10%] rounded-2xl bg-dark text-red font-medium flex flex-row items-center whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#C53737" class="w-6 mr-4" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                    {{ $message }}
                </b>
            @enderror
            <input class="w-full box-border text-white text-[1.1rem] px-5 py-3 font-medium rounded-xl ring-2 ring-subwhite placeholder:text-[#595959] placeholder:text-base first-letter:focus:outline-none out-of-range:ring-red placeholder:select-none bg-transparent" name="description">
            <input class="px-6 w-1/2 mx-auto py-2 text-white text-[1.7rem] font-semibold rounded-2xl ring-addictive ring-2 cursor-pointer ease-out duration-200
                 hover:ring-2 hover:ring-addictive hover:bg-addictive hover:text-dark" type="submit" value="Create">
        </div>
    </div>
</form>
@endsection
