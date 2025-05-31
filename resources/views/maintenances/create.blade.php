<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create maintenance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('maintenances.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="serial_number" class="block text-sm font-medium text-gray-700">Serial number</label>
                        <select name="serial_number" id="serial_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="">-- Select serial number --</option>
                            @foreach ($machines as $machine)
                                <option value="{{ $machine->serial_number }}">{{ $machine->serial_number }}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="date" name="maintenance_date_start" id="maintenance_date_start">

                    <br>
                    <br>
                    <input type="date" name="maintenance_date_end" id="maintenance_date_end">
                    
                    <br>
                    <br>
    


                    <div class="mb-4">
                    <select name="type" id="type">
                        <option value="">-- Select type --</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
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
