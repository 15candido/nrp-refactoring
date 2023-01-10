<div class="relative flex items-top justify-end bg-cyan-600 text-white dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>