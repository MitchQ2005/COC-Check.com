<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $base->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col md:flex-row items-center md:items-start">
                        <img src="{{ $base->image_url }}" alt="{{ $base->name }}" class="w-60 h-60 object-cover rounded mb-4 md:mb-0 md:mr-6">
                        <div class="flex flex-col w-full">
                            <h2 class="font-semibold text-2xl text-gray-800 leading-tight mb-4">{{ $base->name }}</h2>
                            <div class="bg-gray-100 p-4 rounded-lg mb-4 w-full">
                                <p class="text-gray-600 mb-2">{{ $base->description }}</p>
                            </div>
                            <div class="bg-gray-100 p-4 rounded-lg mb-4 w-full">
                                <p class="text-gray-600 mb-2">Type: <span class="font-semibold">{{ $base->base_type }}</span></p>
                            </div>
                            <div class="bg-gray-100 p-4 rounded-lg mb-4 w-full">
                                <p class="text-gray-600 mb-2">Author: <span class="font-semibold">{{ $base->user->name }}</span></p>
                            </div>
                            <x-primary-button onclick="copyToClipboard('{{ $base->layout_link }}')">Copy Base Link</x-primary-button>
                        </div>
                    </div>
                    <x-secondary-button href="{{ route('bases.index') }}">Back</x-secondary-button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('Base link copied to clipboard');
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        }
    </script>
</x-app-layout>