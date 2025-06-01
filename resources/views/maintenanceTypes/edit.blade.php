<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Maintenance Type') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('maintenanceTypes.update', $maintenanceTypes->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('name') border-red-500 @enderror"
                    value="{{ old('name', $maintenanceTypes->name) }}" required placeholder="Name...">
                </div>

                <div class="mb-4">
                    <label for="km" class="block text-sm font-medium text-gray-700">km</label>
                    <input type="number" name="km" id="km"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('km') border-red-500 @enderror"
                    value="{{ old('km', $maintenanceTypes->km) }}" required placeholder="km...">
                </div>
    
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow transition duration-200">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>