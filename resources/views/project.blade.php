<x-guestLayout>

    {{-- Page title --}}
    <x-slot name="title">
        {{ $project->name }}
    </x-slot>

    <div class="max-w-4xl m-auto py-20 space-y-6 bg-white">
        <article class="bg-gray-100 space-y-6 p-2">
            <div class="flex flex-col space-y-3">
                <h1 class="ext-xs font-black text-gray-700 sm:text-sm md:text-base 
                lg:text-lg xl:text-xl">
                    {{ $project->name }}
                </h1>
                <p class="leading-7">{{ $project->description }}</p>
            </div>
            <div class="flex space-x-2 border-t border-t-gray-400 py-2">
                <strong class="font-bold">Collaborators:</strong>
                @foreach($project->collaborator as $collaborator)
                    <a href="/collaborator/{{$collaborator->username}}" class="flex flex-wrap text-white mr-2 space-x-2
                    space-y-3 bg-teal-400 hover:bg-teal-600 shadow-sm rounded-lg px-2 py-1">
                        {{$collaborator->name}}
                    </a>
                @endforeach
            </div>
        </article>
        <div>
            <a href="/projects" class="text-xs font-medium underline text-sky-600 sm:text-sm 
            md:text-base lg:text-lg xl:text-xl">
                Go Back
            </a>
        </div>
    </div>
</x-guestLayouts>