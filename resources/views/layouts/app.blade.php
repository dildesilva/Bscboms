<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-900">
        <div class="min-h-screen bg-gradient-to-br from-[#4e4e4e] ">
            @livewire('navbarlive')

            <!-- Liquid glass background elements -->
            <div class="fixed inset-0 overflow-hidden pointer-events-none">
                <div class="absolute -top-20 -left-20 w-96 h-96 rounded-full bg-blue-500 opacity-10 mix-blend-overlay blur-3xl"></div>
                <div class="absolute top-1/3 right-0 w-64 h-64 rounded-full bg-purple-500 opacity-10 mix-blend-overlay blur-3xl"></div>
                <div class="absolute bottom-0 left-1/2 w-80 h-80 rounded-full bg-indigo-500 opacity-10 mix-blend-overlay blur-3xl"></div>
            </div>

            <main class="relative">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
