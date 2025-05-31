<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Reason End') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('reasonEnds.update', $reasonEnds->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                    <input type="text" name="type" id="type"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('type') border-red-500 @enderror"
                    value="{{ old('type', $reasonEnds->type) }}" required placeholder="type...">
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