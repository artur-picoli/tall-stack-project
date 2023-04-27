@extends('layouts.base')

@section('body')
    @auth
        @if (Auth::user()->hasVerifiedEmail())
            <x-nav-bar />
            <div class="p-4 sm:ml-64">
            <div class="p-4 mt-14">
        @endif
    @endauth
    @yield('content')
    @isset($slot)
        {{ $slot }}
    @endisset
    @auth
        @if (Auth::user()->hasVerifiedEmail())
            </div>
            </div>
        @endif
    @endauth
@endsection
