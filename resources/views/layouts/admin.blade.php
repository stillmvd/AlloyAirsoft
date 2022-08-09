@extends('layouts.base')

@section('header')
    @include('includes.admin-header')
@endsection

@section('content')
    <x-pages.container>
        @yield('admin-content')
    </x-pages.container>
@endsection