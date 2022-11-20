<x-layout>
    <div class="bg-gray-50 border border-gray-200 rounded p-10 max-w-lg mx-auto mt-12">
        <header class="text-center mb-5">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit: {{$user->name}}
            </h2>
        </header>
        <form action="/users/{{$user->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="name"
                    class="inline-block text-lg mb-2"
                >Full Name/Company Name</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 pl-3 w-full"
                    name="name"
                    value="{{$user->name}}"
                />
                @error('name')
                <p class="text-red-500 text-xs my-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="type" class="inline-block text-lg mb-2"
                >Type</label>
                <select
                    name="type"
                    class="border border-gray-200 rounded p-2 w-full bg-white"
                >
                    <option disabled selected value>{{$user->getUserType($user->type)}}</option>
                    @foreach(\App\Models\User::userTypes() as $key => $type)
                        <option value="{{$key}}">{{$type}}</option>
                    @endforeach
                </select>
                @error('type')
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
                    value="{{$user->getUserIdZerofill()}}"
                    placeholder="Example: 11019020145"
                />
                @error('identification_nr/registration_nr')
                <p class="text-red-500 text-xs my-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                    Update
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</x-layout>
