<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Bases') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold mb-6">{{ __("Your Bases") }}</h2>

                    <form method="GET" action="{{ route('bases.my-bases') }}" class="mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" id="name" value="{{ request('name') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="town_hall_id" class="block text-sm font-medium text-gray-700">Town Hall Level</label>
                                <select name="town_hall_id" id="town_hall_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">All</option>
                                    @foreach ($townHalls as $townHall)
                                        <option value="{{ $townHall->id }}" {{ request('town_hall_id') == $townHall->id ? 'selected' : '' }}>{{ $townHall->level }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Filter</button>
                            </div>
                        </div>
                    </form>

                    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">Name</th>
                                <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">Town Hall Level</th>
                                <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">Town Description</th>
                                <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">Town image</th>

                                <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($bases as $base)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4 text-sm text-gray-700">{{ $base->name }}</td>
                                    <td class="py-3 px-4 text-sm text-gray-700">{{ $base->townHall->level }}</td>
                                    <td class="py-3 px-4 text-sm text-gray-700">{{ $base->description }}</td>


                                    <td class="py-3 px-4 text-sm text-gray-700">
                                        <img src="{{ $base->image_url }}" alt="{{ $base->name }}" class="w-24 h-24 object-cover rounded">
                                    </td>

                                    <td class="py-3 px-4 text-sm text-gray-700">
                                        <a href="{{ route('bases.edit', $base->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Edit</a>
                                        <form action="{{ route('bases.destroy', $base->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this base?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                    <div class="mt-6">
                        <a href="{{ route('dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>