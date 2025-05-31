

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Provinces') }}
        </h2>
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show"
                x-init="setTimeout(() => show = false, 3000)"
                class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow">
                {{ session('success') }}
            </div>
        @endif
        <br>
    </x-slot>

    <div class="py-12 px-4">
        <div class="w-full">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="overflow-x-auto">
                    <table class="w-full table-auto bg-white rounded-lg">
                        <thead class="w-full table-auto bg-white rounded-lg">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Update</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($provinces as $province)
                                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $province->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $province->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm"><a href="{{ route('provinces.edit', $province->id) }}" class="text-green-600 hover:underline font-medium">Update</a></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <form action="{{ route('provinces.destroy', $province->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline font-medium bg-transparent border-none p-0 m-0 cursor-pointer">
                                                Delete
                                            </button>
                                        </form>
                                    </td>                                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-center mb-4">
                        <a href="{{ route('provinces.create') }}" 
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow transition duration-200">
                            New Province
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>