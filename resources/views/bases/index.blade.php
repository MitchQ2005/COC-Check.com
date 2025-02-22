<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bases') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Base layouts by Townhall
                    </h2>
                </div>
            </div>
            @auth
            <div class="mt-6 flex justify-between items-center">

                <div class="flex items-center">
                    <a href="{{ route('bases.create') }}" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600">Create Base</a>
                </div>

                <div class="flex-1 ml-4">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Click on Create base to create a base for everyone to see! You can also create a base from the dashboard.</h2>
                </div>
            </div>
            @endauth

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
                @foreach ($townHalls as $townHall)
                <div class="bg-white shadow rounded overflow-hidden">
                    <div class="bg-gray-100 p-4">
                        <h2 class="text-xl font-semibold text-center">Town Hall Level {{ $townHall->level }}</h2>
                    </div>
                    <div class="p-4">
                        <ul>
                            @foreach ($townHall->bases as $base)
                            <li class="flex flex-col items-center py-2 border-b">
                                <img src="{{ $base->image_url }}" alt="{{ $base->name }}" class="w-40 h-40 object-cover rounded mb-2">
                                <div class="text-center">
                                    <a href="{{ route('bases.show', $base->id) }}" class="text-blue-500 hover:underline font-semibold">{{ $base->name }}</a>
                                    <p class="text-gray-600">{{ $base->description }}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>