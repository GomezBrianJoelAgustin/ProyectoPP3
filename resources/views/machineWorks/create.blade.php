<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create machines works') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('machineWorks.store') }}" method="POST">
                    @csrf

                    <strong>Date start</strong>
                    <br>
                    <input type="date" name="date_start" id="date_start">

                    <br>
                    <br>

                    <div class="mb-4">
                        <label for="id_machines" class="block text-sm font-medium text-gray-700">Machines</label>
                        <select name="id_machines" id="id_machines" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Select Machine --</option>
                            @foreach ($machines as $machine)
                                <option value="{{ $machine->id }}">{{ $machine->serial_number }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="id_works" class="block text-sm font-medium text-gray-700">Works</label>
                        <select name="id_works" id="id_works" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Select Work --</option>
                            @foreach ($works as $work)
                                <option value="{{ $work->id }}">{{ $work->name }}</option>
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
