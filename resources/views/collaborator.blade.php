<x-guestLayout>
    {{-- Page title --}}
    <x-slot name="title">
        {{ __('Projects') }}
    </x-slot>
    <div class="max-w-7xl m-auto py-20 space-y-6 bg-white">
        <button class="text-lg font-bold text-white bg-teal-400 p-3 uppercase shadow-lg rounded-lg
        hover:bg-teal-600 transition-all duration-500">
            <a href="/">Home</a>
        </button>
       <div class="grid grid-cols-2 gap-4">
            @foreach ($collaborator->projects as $project)
                <article class="p-4 space-y-6 border shadow-md rounded-lg hover:bg-gray-50">
                    <div class="flex flex-col space-y-3">
                        <h1 class="text-xs font-black sm:text-sm md:text-base 
                        lg:text-lg xl:text-xl">
                            <a href="/projects/{{$project->slug}}" class="text-sky-600 underline">
                                {{ $project->name }}
                            </a>
                        </h1>
                        <p class="leading-7">{{ $project->excerpt }}</p>
                    </div>
                    <div class="flex space-x-2 border-t border-t-gray-400 py-2">
                        <strong class="font-bold">Collaborator:</strong>
                        <a href="#" class="text-white mr-2 bg-teal-400 hover:bg-teal-600 shadow-sm 
                        rounded-lg px-2 py-1">{{$collaborator->name}}</a>
                    </div>
                </article>
            @endforeach
       </div>
    </div>
</x-guestLayouts>
