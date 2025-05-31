<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Maintenance') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">

            <form action="{{ route('maintenances.update', $maintenance->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="id_machine" class="block text-sm font-medium text-gray-700">Serial number</label>
                    <select name="id_machine" id="id_machine" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">-- Select serial number --</option>
                        @foreach ($machines as $machine)
                            <option value="{{ $machine->id }}"
                                {{ old('id_machine', $maintenance->id_machine) == $machine->id ? 'selected' : '' }}>
                                {{ $machine->serial_number }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-4">
                    <label for="maintenance_date_start" class="block text-sm font-medium text-gray-700">Date start</label>
                    <input type="date" name="maintenance_date_start" id="maintenance_date_start"
                           value="{{ old('maintenance_date_start', \Carbon\Carbon::parse($maintenance->maintenance_date_start)->format('Y-m-d')) }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

 
                <div class="mb-4">
                    <label for="maintenance_date_end" class="block text-sm font-medium text-gray-700">Date end</label>
                    <input type="date" name="maintenance_date_end" id="maintenance_date_end"
                           value="{{ old('maintenance_date_end', $maintenance->maintenance_date_end ? \Carbon\Carbon::parse($maintenance->maintenance_date_end)->format('Y-m-d') : '') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>


                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Maintenance Type</label>
                    <select name="type" id="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Select type --</option>
                        @foreach ($types as $typeOption) {{-- Renamed $type to $typeOption to avoid conflict with $type variable --}}
                            <option value="{{ $typeOption->id }}"
                                {{ old('type', $maintenance->type) == $typeOption->id ? 'selected' : '' }}>
                                {{ $typeOption->name }}
                            </option>
                        @endforeach
                    </select>
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