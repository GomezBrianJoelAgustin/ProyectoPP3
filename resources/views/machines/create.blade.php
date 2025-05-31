<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Machine') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('machines.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="serial_number" class="block text-sm font-medium text-gray-700">Serial number</label>
                        <input type="text" name="serial_number" id="serial_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required placeholder="SERIE - XXX">
                    </div>

                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select name="type" id="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Select Type --</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                        <select name="model" id="model" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Select Model --</option>
                            @foreach ($models as $model)
                                <option value="{{ $model->model }}">{{ $model->model }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="flex justify-end">
                        <button type="submit"  class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow transition duration-200">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
