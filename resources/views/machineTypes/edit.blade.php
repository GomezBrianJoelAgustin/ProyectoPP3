<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit machines works') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('machineTypes.update', $machineTypes->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Km travel</label>
                    <input type="text" name="name" id="name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('name') border-red-500 @enderror"
                    value="{{ old('name', $machineTypes->name) }}" required placeholder="name...">
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