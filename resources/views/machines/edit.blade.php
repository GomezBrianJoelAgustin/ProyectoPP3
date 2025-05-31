<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Machine') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">

            <form action="{{ route('machines.update', $machine->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="serial_number" class="block text-sm font-medium text-gray-700">Serial Number</label>
                    <input type="text" name="serial_number" id="serial_number" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                           name= "serial_number"
                           value="{{ old('serial_number', $machine->serial_number) }}" required>
                    @error('serial_number')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                    <select name="type" id="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Select Type --</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type', $machine->typeRelation->id ?? '') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                    <select name="model" id="model" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Select Model --</option>
                        @foreach ($models as $model)
                            <option value="{{ $model->model }}" {{ old('model', $machine->model) == $model->model ? 'selected' : '' }}>
                                {{ $model->model }}
                            </option>
                        @endforeach
                    </select>
                </div>


                 <div class="flex justify-end">
                        <button type="submit"  class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow transition duration-200">
                            Update
                        </button>
                    </div>
            </form>

        </div>
    </div>
</x-app-layout>
