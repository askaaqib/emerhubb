@extends('layouts.base')

@section('body')
    <div class="flex">
        @auth
            <livewire:sidebar />
        @endauth

        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
