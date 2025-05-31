<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create province') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('works.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required placeholder="Name...">
                    </div>

                    <div class="mb-4">
                        <label for="province" class="block text-sm font-medium text-gray-700">province</label>
                        <select name="province" id="province" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Select province --</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>

                     <input type="date" name="date_start" id="date_start">

                    <br>
                    <br>
                    <input type="date" name="date_end" id="date_end">
                    
                    <br>
                    <br>
                 


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

