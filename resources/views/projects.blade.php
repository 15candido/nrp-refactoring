<x-guestLayout>
    {{-- Page title --}}
    <x-slot name="title">
        {{ __('Projects') }}
    </x-slot>
    <div class="max-w-7xl m-auto py-20 space-y-6 bg-white">
       <div class="grid grid-cols-2 gap-4">
            @foreach ($projects as $project)
                <article class="p-4 space-y-6 border shadow-md rounded-lg hover:bg-gray-50">
                    <div class="flex flex-col space-y-3">
                        <h1 class="text-xs font-black sm:text-sm md:text-base 
                        lg:text-lg xl:text-xl">
                            <a href="projects/{{$project->id}}" class="text-sky-600 underline">
                                {{ $project->name }}
                            </a>
                        </h1>
                        <p class="leading-7">{{ $project->excerpt }}</p>
                    </div>
                    <div class="flex space-x-2 border-t border-t-gray-400 py-2">
                        <strong class="font-bold">Collaborators:</strong>
                        @foreach($project->people as $participate)
                            <a href="/collaborator/{{$participate->id}}" class="text-sky-600 underline mr-2">{{$participate->name}}</a>
                        @endforeach
                    </div>
                </article>
            @endforeach
       </div>
    </div>
</x-guestLayouts>
