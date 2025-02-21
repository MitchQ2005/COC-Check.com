<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>{{ __("welcome " . Auth::user()->name . "!") }}</h2>
                    <br>
                    this is your user dashboard where you can upload, and manage your existing base layouts. you can also manage your account from here.
                </div>
            </div>
            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg relative h-64">
                    <div class="absolute inset-0 bg-cover bg-center opacity-50" style="background-image: url('{{ asset('images/coc-check bases.png') }}');"></div>
                    <div class="relative p-6 text-gray-900 flex items-center justify-center h-full">
                        <a href="{{ route('bases.create') }}" class="text-blue-500 hover:underline">Upload Base</a>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg relative h-64">
                    <div class="absolute inset-0 bg-cover bg-center opacity-50" style="background-image: url('{{ asset('images/my-bases.jpg') }}')"></div>
                    <div class="relative p-6 text-gray-900 flex items-center justify-center h-full">
                        <a href="{{ route('bases.index') }}" class="text-blue-500 hover:underline">My Bases</a>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg relative h-64">
                    <div class="absolute inset-0 bg-cover bg-center opacity-50" style="background-image: url('{{ asset('images/edit profile.png') }}');"></div>
                    <div class="relative p-6 text-gray-900 flex items-center justify-center h-full">
                        <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:underline">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>