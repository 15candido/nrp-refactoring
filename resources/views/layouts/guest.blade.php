<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-partials.head :title="$title ?? ' ' "/>
    </head>
    <body class="font-sans">

        {{-- Navigation section --}}
        <x-partials.nav />

        {{-- Body section --}}
        <main class="min-h-screen text-gray-900 antialiased">
            {{ $slot }}
        </main>

        {{-- Footer section --}}
        <x-partials.footer />

        {{-- Scripts section --}}
        <livewire:scripts>
        @stack('scripts')

    </body>
</html>
