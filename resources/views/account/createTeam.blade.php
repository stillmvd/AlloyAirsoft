@extends('layouts.base')

@section('title', 'Create Team')

@section('content')
<main class="grow pt-10 mx-auto">
    <form action="{{ route('storeTeam', ['id' => Auth::user()->id ]) }}" method="post" class="grid grid-rows-3 gap-5">
        @csrf
        <input type="text" name="name">
        <input type="text" name="descriprion">
        <input type="submit" value="Create">
    </form>
</main>

@endsection
