<x-guestLayout>
    <div class="max-w-7xl m-auto py-20 space-y-6 bg-white">
        <button class="text-lg font-bold text-white bg-teal-400 p-3 uppercase shadow-lg rounded-lg
            hover:bg-teal-600 transition-all duration-500">
            <a href="/">Go Back!</a>
        </button>
        <div class="space-y-4 bg-gray-100">
            {{-- Table Section--}}
            <div class="relative overflow-x-auto overflow-y-hidden bg-white shadow rounded-lg">
                <table class="table-auto w-full text-sm text-left text-gray-500">
                    <thead class="text-xs uppercase bg-gray-100">
                        <tr class="whitespace-nowrap">
                            <th scope="col" class="py-5 px-6">
                                Demand ID
                            </th>
                            <th scope="col" class="py-5 px-6">
                                Item ID
                            </th>
                            <th scope="col" class="py-5 px-6">
                                Quantity
                            </th>
                            <th scope="col" class="py-5 px-6">
                                Note
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            @foreach($item->demands as $demand)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-4 px-6">
                                    {{$demand->pivot->demand_id}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$demand->pivot->item_id}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$demand->pivot->quantity}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$demand->pivot->note}}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-guestLayout>