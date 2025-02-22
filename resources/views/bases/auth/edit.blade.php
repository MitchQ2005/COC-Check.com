<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Base') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Edit Base</h1>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <strong class="font-bold">Whoops!</strong>
                    <span class="block sm:inline">There were some problems with your input.</span>
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('bases.update', $base->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" value="{{ old('name', $base->name) }}" required>
                </div>
                <div class="mb-4">
                    <label for="image_url" class="block text-gray-700 font-bold mb-2">Image URL</label>
                    <input type="url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image_url" name="image_url" value="{{ old('image_url', $base->image_url) }}" required>
                </div>
                <div class="mb-4">
                    <label for="layout_link" class="block text-gray-700 font-bold mb-2">Layout Link</label>
                    <input type="url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="layout_link" name="layout_link" value="{{ old('layout_link', $base->layout_link) }}" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" required>{{ old('description', $base->description) }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="base_type" class="block text-gray-700 font-bold mb-2">Base Type</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="base_type" name="base_type" value="{{ old('base_type', $base->base_type) }}" required>
                </div>
                <div class="mb-4">
                    <label for="town_hall_id" class="block text-gray-700 font-bold mb-2">Town Hall Level</label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="town_hall_id" name="town_hall_id" required>
                        @foreach ($townHalls as $townHall)
                            <option value="{{ $townHall->id }}" {{ old('town_hall_id', $base->town_hall_id) == $townHall->id ? 'selected' : '' }}>{{ $townHall->level }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="flex justify-between">
                    <x-primary-button>Update Base</x-primary-button>
                    <x-secondary-button href="{{ route('bases.my-bases') }}">Cancel</x-secondary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>