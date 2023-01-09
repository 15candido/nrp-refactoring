<x-guestLayout>
    <div class="grid grid-cols-3 mt-8 gap-3">
        @foreach ($people as $person)
            <div class="border bg-white">
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
</x-guestLayout>