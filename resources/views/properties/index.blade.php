<x-layout>
    <div class="bg-white p-8 rounded-md w-full">
        <div class=" flex items-center justify-between pb-6">
            <div>
                <h2 class="text-gray-600 font-semibold">Property list</h2>
            </div>
            <div class="flex items-center justify-between">
                <div class="lg:ml-40 ml-10 space-x-8">
                    <a href="properties/create">
                        <button
                            class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                            Create
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                #
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                name
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                cadastral&nbsp;nr
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                status
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Owner
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                land&nbsp;units
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                edit
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                delete
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @unless((count($properties)) == 0)
                            @for($i=0; $i<count($properties); $i++)
                                <tr>
                                    <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$i+1}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$properties[$i]->name}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{$properties[$i]->getLandPropertyZerofill()}}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if($properties[$i]->status == 1)
                                            <p class="text-yellow-600 whitespace-no-wrap">
                                                {{$properties[$i]->getLandPropertyStatus($properties[$i]->status)}}
                                            </p>
                                        @elseif($properties[$i]->status == 2)
                                            <p class="text-green-500 whitespace-no-wrap">
                                                {{$properties[$i]->getLandPropertyStatus($properties[$i]->status)}}
                                            </p>
                                        @elseif($properties[$i]->status == 3)
                                            <p class="text-green-900 whitespace-no-wrap">
                                                {{$properties[$i]->getLandPropertyStatus($properties[$i]->status)}}
                                            </p>
                                        @else
                                            <p class="text-red-900 whitespace-no-wrap">
                                                {{$properties[$i]->getLandPropertyStatus($properties[$i]->status)}}
                                            </p>
                                        @endif
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{$properties[$i]->user->name}}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <button
                                            class="bg-transparent hover:bg-indigo-600 text-indigo-600 font-semibold hover:text-white py-2 px-4 border border-indigo-600 hover:border-transparent rounded">
                                            View
                                        </button>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-lg">
                                        <form method="GET" action="/properties/{{$properties[$i]->id}}/edit">
                                            @csrf
                                            <button><i class="fa-solid fa-pen-to-square"></i></button>
                                        </form>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-lg">
                                        <form method="POST" action="/properties/{{$properties[$i]->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-500"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endfor
                        @else
                            <p>No users found</p>
                        @endunless
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
