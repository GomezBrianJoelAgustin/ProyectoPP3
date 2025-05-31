<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit work') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">

            <form action="{{ route('works.update', $work->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                 <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Work Name</label>
                    <input type="text" name="name" id="name"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('name') border-red-500 @enderror"
                           value="{{ old('name', $work->name) }}" required placeholder="Work Name...">
                </div>

                <div class="mb-4">
                    <label for="province" class="block text-sm font-medium text-gray-700">Serial number</label>
                    <select name="province" id="province" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">-- Select province --</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}"
                                {{ old('province', $work->province) == $province->id ? 'selected' : '' }}>
                                {{ $province->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                 <div class="mb-4">
                    <label for="date_start" class="block text-sm font-medium text-gray-700">Date star</label>
                    <input type="date" name="date_start" id="date_start"
                           value="{{ old('date_start', $work->date_start ? \Carbon\Carbon::parse($work->date_start)->format('Y-m-d') : '') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                 <div class="mb-4">
                    <label for="date_end" class="block text-sm font-medium text-gray-700">Date end</label>
                    <input type="date" name="date_end" id="date_end"
                           value="{{ old('date_end', $work->date_end ? \Carbon\Carbon::parse($work->date_end)->format('Y-m-d') : '') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
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