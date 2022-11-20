<x-layout>
    <div class="bg-gray-50 border border-gray-200 rounded p-10 max-w-lg mx-auto mt-12">
        <header class="text-center mb-5">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a new land property
            </h2>
        </header>
        <form action="/properties" method="POST">
            @csrf
            <div class="mb-6">
                <label
                    for="name"
                    class="inline-block text-lg mb-2"
                >Land property name</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 pl-3 w-full"
                    name="name"
                    value="{{old('name')}}"
                />
                @error('name')
                <p class="text-red-500 text-xs my-1">{{$message}}</p>
                @enderror
            </div>
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
                <label for="status" class="inline-block text-lg mb-2"
                >Type</label>
                <select
                    name="status"
                    class="border border-gray-200 rounded p-2 w-full bg-white"
                >
                    <option disabled selected value>Select type</option>
                    @foreach(\App\Models\LandProperty::landPropertyStatusTypes() as $key => $type)
                        <option value="{{$key}}">{{$type}}</option>
                    @endforeach
                </select>
                @error('status')
                <p class="text-red-500 text-xs my-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="identification_nr/registration_nr"
                    class="inline-block text-lg mb-2"
                >Personal ID/Registration Nr</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 pl-3 w-full"
                    name="identification_nr/registration_nr"
                    value="{{old('identification_nr/registration_nr')}}"
                    placeholder="Example: 11019020145"
                />
                @error('identification_nr/registration_nr')
                <p class="text-red-500 text-xs my-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                    Create
                </button>

                <a href="/properties" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</x-layout>
