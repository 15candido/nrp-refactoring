<x-guestLayout>
    <div class="max-w-7xl m-auto py-20 space-y-6 bg-white">
        <button class="text-lg font-bold text-white bg-teal-400 p-3 uppercase shadow-lg rounded-lg
        hover:bg-teal-600 transition-all duration-500">
            <a href="/">Go Back!</a>
        </button>
        <div class="grid grid-cols-5 gap-2 justify-center">
            <div class="col-span-2 mr-20 space-y-6">
                <h1 class="text-xl font-black uppercase">Collaborator</h1>
                <div class="flex justify-between ">
                    <div class="flex flex-col">
                        <h1 class="text-base font-semibold text-gray-700 uppercase">Name</h1>
                        <p>{{$collaborator->name}}</p>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-base font-semibold text-gray-700 uppercase">Eamil</h1>
                        <p>{{$collaborator->email}}</p>
                    </div>
                </div>
                <div class="flex flex-col space-y-6">
                   
                    <div class="flex flex-col gap-4">
                        <h1 class="text-xs font-black uppercase">Projects</h1>
                        <div class="flex flex-wrap gap-2">
                            @foreach($collaborator->projects as $project)
                                <a href="/projects/{{$project->slug}}" class="text-white mr-2
                                bg-teal-400 hover:bg-teal-600 shadow-sm rounded-lg px-2 py-1">{{$project->name}}</a>
                            @endforeach  
                        </div>                   
                    </div>
                </div>
            </div>
            {{-- Table Section--}}
            <div class="col-span-3 space-y-4">
                <div>
                    <h1 class="text-xl font-black uppercase">Donation</h1>
                </div>
                <div class="bg-white shadow-2xl rounded-lg">
                    <table class="table-auto w-full text-sm text-left text-gray-500">
                        <thead class="text-xs uppercase bg-gray-100">
                            <tr class="whitespace-nowrap">
                                <th scope="col" class="py-5 px-6">
                                    Item ID
                                </th>
                                <th scope="col" class="py-5 px-6">
                                    Person ID
                                </th>
                                <th scope="col" class="py-5 px-6">
                                    Quantity
                                </th>
                                <th scope="col" class="py-5 px-6">
                                    Donate Date
                                </th>
                                <th scope="col" class="py-5 px-6">
                                    Item Note
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($collaborator->items as $item)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-4 px-6">
                                    {{$item->pivot->item_id}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$item->pivot->person_id}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$item->pivot->quantity}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$item->pivot->donate_date}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$item->pivot->note}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-guestLayout>