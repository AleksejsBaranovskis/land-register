<x-layout>
    <div class="bg-gray-50 border border-gray-200 rounded p-10 max-w-lg mx-auto mt-12">
        <header class="text-center mb-5">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a new land unit
            </h2>
        </header>
        <form action="/properties/{{$property->id}}/units" method="POST">
            @csrf
            <div class="mb-6">
                <label
                    for="cadastral_nr"
                    class="inline-block text-lg mb-2"
                >Cadastral Nr</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 pl-3 w-full"
                    name="cadastral_nr"
                    value="{{old('cadastral_nr')}}"
                />
                @error('cadastral_nr')
                <p class="text-red-500 text-xs my-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label
                    for="total_area(ha)"
                    class="inline-block text-lg mb-2"
                >Total area in hectares</label>
                <input
                    type="number"
                    step="0.01"
                    min="0"
                    class="border border-gray-200 rounded p-2 pl-3 w-full"
                    name="total_area(ha)"
                    value="{{old('total_area(ha)')}}"
                />
                @error('total_area(ha)')
                <p class="text-red-500 text-xs my-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="land_usage_id" class="inline-block text-lg mb-2"
                >Type</label>
                <select
                    name="land_usage_id"
                    class="border border-gray-200 rounded p-2 w-full bg-white"
                >
                    <option disabled selected value>Select type</option>
                    @foreach(\App\Models\LandUnit::landUnitUseTypes() as $key => $type)
                        <option value="{{$key}}">{{$type}}</option>
                    @endforeach
                </select>
                @error('land_usage_id')
                <p class="text-red-500 text-xs my-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="measurement_date"
                    class="inline-block text-lg mb-2"
                >Measurement date</label>
                <input
                    type="date"
                    class="border border-gray-200 rounded p-2 pl-3 w-full"
                    name="measurement_date"
                    value="{{old('measurement_date')}}"
                    placeholder="Example: 11019020145"
                />
                @error('measurement_date')
                <p class="text-red-500 text-xs my-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="property_cadastral_nr"
                    class="inline-block text-lg mb-2"
                >Property cadastral Nr</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 pl-3 w-full"
                    name="property_cadastral_nr"
                    value="{{old('property_cadastral_nr')}}"
                    placeholder="Example: 11019020145"
                />
                @error('property_cadastral_nr')
                <p class="text-red-500 text-xs my-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                    Create
                </button>
                <a href="{{url()->previous()}}" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</x-layout>
