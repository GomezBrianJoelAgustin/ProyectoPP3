<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maintenances') }}
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
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Machine</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">ID machine</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Maintenance start</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Maintenance end</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Update</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($maintenances as $maintenance)
                                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $maintenance->machines->serial_number }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $maintenance->id_machine }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $maintenance->maintenance_date_start }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $maintenance->maintenance_date_end }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $maintenance->maintenanceTypes->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm"><a href="{{ route('maintenances.edit', $maintenance->id) }}" class="text-green-600 hover:underline font-medium">Update</a></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <form action="{{ route('maintenances.destroy', $maintenance->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline;">
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
                        <a href="{{ route('maintenances.create') }}" 
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow transition duration-200">
                            New maintenance
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
