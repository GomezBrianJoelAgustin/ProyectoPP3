<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit machines works') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('machineWorks.update', $machine_work->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="date_start" class="block text-sm font-medium text-gray-700">Date start</label>
                    <input type="date" name="date_start" id="date_start"
                           value="{{ old('date_start', $machine_work->date_start ? \Carbon\Carbon::parse($machine_work->date_start)->format('Y-m-d') : '') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
             
                <div class="mb-4">
                    <label for="date_end" class="block text-sm font-medium text-gray-700">Date end</label>
                    <input type="date" name="date_end" id="date_end"
                           value="{{ old('date_end', $machine_work->date_end ? \Carbon\Carbon::parse($machine_work->date_end)->format('Y-m-d') : '') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mb-4">
                    <label for="reason_end" class="block text-sm font-medium text-gray-700">Reason end</label>
                    <select name="reason_end" id="reason_end" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Select reason end --</option>
                        @foreach ($reasonEnds as $reasonEnd)
                            <option value="{{ $reasonEnd->id }}"
                                {{ old('reason_end', $machine_work->reason_end) == $reasonEnd->id ? 'selected' : '' }}>
                                {{ $reasonEnd->type }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="km_travel" class="block text-sm font-medium text-gray-700">Km travel</label>
                    <input type="number" name="km_travel" id="km_travel"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('name') border-red-500 @enderror"
                    value="" placeholder="{{ old('km_travel', $machine_work->km_travel) }}">
                </div>
    
                <div class="mb-4">
                    <label for="id_machines" class="block text-sm font-medium text-gray-700">Machines</label>
                    <select name="id_machines" id="id_machines" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">-- Select Machine --</option>
                        @foreach ($machines as $machine)
                            <option value="{{ $machine->id }}"
                                {{ old('id_machines', $machine_work->id_machines) == $machine->id ? 'selected' : '' }}>
                                {{ $machine->serial_number }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="id_works" class="block text-sm font-medium text-gray-700">Works</label>
                    <select name="id_works" id="id_works" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">-- Select reason end --</option>
                        @foreach ($works as $work)
                            <option value="{{ $work->id }}"
                                {{ old('id_works', $machine_work->id_works) == $work->id ? 'selected' : '' }}>
                                {{ $work->name }}
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