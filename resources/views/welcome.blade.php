<x-guestLayout>
    <div class="max-w-6xl m-auto py-16 space-y-6">
    <div class="flex gap-4">
        <button class="text-lg font-bold text-white bg-teal-400 p-3 uppercase shadow-lg rounded-lg
        hover:bg-teal-600 transition-all duration-500">
            <a href="/">All People</a>
        </button>
        <button class="text-lg font-bold text-white bg-teal-400 p-3 uppercase shadow-lg rounded-lg
        hover:bg-teal-600 transition-all duration-500">
            <a href="withuser">Only With User</a>
        </button>
        <button class="text-lg font-bold text-white bg-teal-400 p-3 uppercase shadow-lg rounded-lg
        hover:bg-teal-600 transition-all duration-500">
            <a href="projects">Projects</a>
        </button>
    </div>
    <div class="grid grid-cols-3 gap-4">

        @foreach ($people as $person)
            <div class="space-y-6 border shadow-md rounded-lg hover:bg-gray-50">
                {{-- People--}}
                <div class="w-full text-base font-medium p-4 bg-gray-100">
                    <h1 class="text-xl font-bold text-gray-700 pb-2">People</h1>
                    <p class="">{{ $person->name }}</p>
                    <p>{{ $person->email }}</p>
                </div>

                {{-- User --}}
                @if ($person->user)
                    <div class="w-full text-base font-medium p-4">
                        <h1 class="text-base font-bold text-gray-600 pb-2">My user account</h1>
                        <p>{{ $person->user->name }}</p>
                        <p>{{ $person->user->email }}</p>
                    </div>
                @endif            
            </div>
        @endforeach
    </div>
    </div>
</x-guestLayout>

