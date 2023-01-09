@extends('layouts.base')

@section('content')
    <main class="grow">
        <h2 class="my-10">
            {{ __('Archive release soon') }}
        </h2>
        <img src="{{ asset('image/soon.svg') }}" alt="release soon" class="w-full select-none">
    </main>
@endsection
