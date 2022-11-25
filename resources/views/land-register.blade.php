<x-layout>
    <div class="bg-white p-8 rounded-md w-full">
        <div class=" flex items-center justify-between pb-6">
            <div>
                <h2 class="text-gray-600 font-semibold">Summary</h2>
            </div>
        </div>
        @unless((count($users)) == 0)
            <div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    name
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    id/reg.nr
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Properties
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$user->name}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if($user->type == 1)
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                id {{substr($user->getUserIdZerofill(), 0, 6)}}
                                                - {{substr($user->getUserIdZerofill(), 6, 5)}}
                                            </p>
                                        @else
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                reg.nr {{$user->getUserIdZerofill()}}
                                            </p>
                                        @endif
                                    </td>
                                    @if(count($user->landProperty) !== 0)
                                        <td class="px-2 pb-3 border border-gray-200 bg-white text-sm">
                                            <table class="min-w-full leading-normal">
                                                <thead>
                                                <tr>
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
                                                        Status
                                                    </th>
                                                    <th
                                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                        Land&nbsp;units
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($user->landProperty as $property)
                                                    <tr>
                                                        <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm w-32">
                                                            <div class="flex items-center">
                                                                <div class="ml-3">
                                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                                        {{$property->name}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm w-32">
                                                            <div class="flex items-center">
                                                                <div class="ml-3">
                                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                                        {{$property->cadastral_nr}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm w-32">
                                                            <div class="flex items-center">
                                                                <div class="ml-3">
                                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                                        {{$property->getLandPropertyStatus($property->status)}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @if(count($property->landUnit) !== 0)
                                                            <td class="px-2 pb-5 border-b border-l border-gray-200 bg-white text-sm">
                                                                <table class="min-w-full leading-normal">
                                                                    <thead>
                                                                    <tr>
                                                                        <th
                                                                            class="px-5 py-3 w-1/3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                                            cadastral&nbsp;nr
                                                                        </th>
                                                                        <th
                                                                            class="px-5 py-3 w-1/3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                                            total&nbsp;area
                                                                        </th>
                                                                        <th
                                                                            class="px-5 py-3 w-1/3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                                            land use
                                                                        </th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($property->landUnit as $unit)
                                                                        <tr>
                                                                            <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm w-32">
                                                                                <div class="flex items-center">
                                                                                    <div class="ml-3">
                                                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                                                            {{$unit->cadastral_nr}}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm w-32">
                                                                                <div class="flex items-center">
                                                                                    <div class="ml-3">
                                                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                                                            {{$unit['total_area(ha)']}}
                                                                                            ha
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm w-32">
                                                                                <div class="flex items-center">
                                                                                    <div class="ml-3">
                                                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                                                            {{$unit->getLandUnitType($unit->land_usage_id)}}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        @else
                                                            <td class="px-2 py-5 border-b border-l border-gray-200 bg-white text-sm">
                                                                <p class="text-gray-900 whitespace-no-wrap text-center">
                                                                    No units found.
                                                                </p>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                    @else
                                        <td class="px-2 py-5 border border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap text-center">
                                                No properties found.
                                            </p>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <p>No users found.</p>
        @endunless
    </div>
</x-layout>
