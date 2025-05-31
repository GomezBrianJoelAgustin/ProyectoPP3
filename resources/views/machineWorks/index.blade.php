<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center"> 
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Machines Works') }}
            </h2>
        <div class="my-6"> 
            <a href="{{ route('machineWorks.create') }}"
            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow transition duration-200">
                New Machines Works
            </a>
        </div>
    </div>
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
            <div class="bg-white dark:bg-black overflow-hidden shadow-lg rounded-lg">
                <div class="overflow-x-auto">
                
                    <h2 class="text-lg font-semibold text-gray-900 px-6 pt-6 text-center">Machine Works in course</h2>
                    <table class="w-full table-auto bg-white rounded-lg">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3">Date start</th>
                                <th class="px-6 py-3">Date end</th>
                                <th class="px-6 py-3">Reason end</th>
                                <th class="px-6 py-3">Km travels</th>
                                <th class="px-6 py-3">Machine</th>
                                <th class="px-6 py-3">Work</th>
                                <th class="px-6 py-3">Finish</th>
                                <th class="px-6 py-3">Edit</th>
                                <th class="px-6 py-3">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($inProgress as $machineWork)
                                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                    <td class="px-6 py-4">{{ $machineWork->id }}</td>
                                    <td class="px-6 py-4">{{ $machineWork->date_start }}</td>
                                    <td class="px-6 py-4">—</td>
                                    <td class="px-6 py-4">—</td>
                                    <td class="px-6 py-4">{{ $machineWork->km_travel }}</td>
                                    <td class="px-6 py-4">{{ $machineWork->machine->serial_number }}</td>
                                    <td class="px-6 py-4">{{ $machineWork->work->name }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('machineWorks.finish', $machineWork->id) }}" class="text-green-600 hover:underline font-medium">Finish</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('machineWorks.edit', $machineWork->id) }}" class="text-blue-600 hover:underline font-medium">Edit</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('machineWorks.destroy', $machineWork->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline font-medium bg-transparent border-none p-0 m-0 cursor-pointer">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="10" class="text-center py-4">No finished works in course.</td></tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="py-12 px-4">
            <div class="w-full">
                <div class="bg-white dark:bg-black overflow-hidden shadow-lg rounded-lg">
                    <div class="overflow-x-auto">
                        
                        <h2 class="text-lg font-semibold text-gray-900 px-6 pt-6 text-center">Finished Machine Works </h2>
                        <table class="w-full table-auto bg-white rounded-lg">
                            <thead>
                                <tr>
                                   <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3">Date start</th>
                                    <th class="px-6 py-3">Date end</th>
                                    <th class="px-6 py-3">Reason end</th>
                                    <th class="px-6 py-3">Km travels</th>
                                    <th class="px-6 py-3">Machine</th>
                                    <th class="px-6 py-3">Work</th>
                                    <th class="px-6 py-3">Edit</th>
                                    <th class="px-6 py-3">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($finished as $machineWork)
                                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                        <td class="px-6 py-4">{{ $machineWork->id }}</td>
                                        <td class="px-6 py-4">{{ $machineWork->date_start }}</td>
                                        <td class="px-6 py-4">{{ $machineWork->date_end }}</td>
                                        <td class="px-6 py-4">{{ $machineWork->reasonEnd->type ?? '—' }}</td>
                                        <td class="px-6 py-4">{{ $machineWork->km_travel }}</td>
                                        <td class="px-6 py-4">{{ $machineWork->machine->serial_number }}</td>
                                        <td class="px-6 py-4">{{ $machineWork->work->name }}</td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('machineWorks.edit', $machineWork->id) }}" class="text-blue-600 hover:underline font-medium">Edit</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <form action="{{ route('machineWorks.destroy', $machineWork->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline font-medium bg-transparent border-none p-0 m-0 cursor-pointer">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="10" class="text-center py-4">No finished works.</td></tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>