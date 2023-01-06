<x-guestLayout>
    <div class="grid grid-cols-3 mt-8 gap-3">
        @foreach ($people as $person)
            <div class="border p-4">
                <div>{{ $person->name }}</div>
                <div>{{ $person->email }}</div>
                @if ($person->user)
                    <div>{{ $person->user->name }}</div>
                    <div>{{ $person->user->email }}</div>
                @endif            
            </div>
        @endforeach
    </div>
</x-guestLayout>