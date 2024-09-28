<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        @if (config('app.env') !== 'production')
            <meta name="robots" content="noindex, nofollow">
        @endif

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="robots" content="noindex, nofollow">

        <title>@stack('page-title') - {{ config('app.name') }}</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <x-head.tiny-mce-config/>
        @vite(['resources/sass/app.scss', 'resources/sass/admin.scss', 'resources/js/app.js', 'resources/js/admin.js'])
        @livewireStyles
        @livewireScripts
        @stack('page-styles')
        @stack('page-scripts')
    </head>
    <body>
        {{--@include('sweetalert::alert')

        @include('admin.layouts.partials.topBar')

        <div class="app-main-container">
            @include('admin.layouts.partials.sidebar')
            <main class="dashboardMain">--}}

        @include('sweetalert::alert')
        @include('admin.layouts.partials.topbar')
        <div class="app-main-container">
            @include('admin.layouts.partials.sidebar')
            <main class="dashboardMain">
