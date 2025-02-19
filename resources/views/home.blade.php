<!-- filepath: /c:/xampp/htdocs/coc-check/COC-Check.com/resources/views/welcome.blade.php -->
<x-app-layout>
<!-- Hero Section -->
<div class="relative bg-cover bg-center h-[60vh]" style="background-image: url('{{ asset('images/COC-herobanner-home.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative flex items-center justify-center h-full">
            <h1 class="text-white text-4xl md:text-6xl font-bold">Welcome to COC-Check</h1>
        </div>
    </div>

    <!-- Search Section -->
    <div class="py-10 px-6 md:px-16">
        <div class="flex flex-col md:flex-row items-center justify-between gap-10">
            <div class="w-full md:w-1/2">
                <img src="/images/search-banner.jpg" alt="Search Banner" class="w-full h-auto rounded shadow">
            </div>
            <div class="w-full md:w-1/2 text-center md:text-left">
                <h2 class="text-2xl font-bold mb-4">Here you can search a player or clan</h2>
                <form action="/search" method="GET">
                    <input 
                        type="text" 
                        name="query" 
                        placeholder="Fill in a user ID or name" 
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:ring focus:outline-none"
                    >
                    <button 
                        type="submit" 
                        class="mt-4 w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded"
                    >Search</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-gray-100 py-10 px-6 md:px-16">
        <h2 class="text-center text-3xl font-bold mb-8">Stats</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white shadow rounded p-6 text-center">
                <p class="text-sm text-gray-500">Total number of searches</p>
                <p class="text-2xl font-bold">0</p>
            </div>
            <div class="bg-white shadow rounded p-6 text-center">
                <p class="text-sm text-gray-500">Most searched clan</p>
                <p class="text-2xl font-bold">N/A</p>
            </div>
            <div class="bg-white shadow rounded p-6 text-center">
                <p class="text-sm text-gray-500">Most searched player</p>
                <p class="text-2xl font-bold">N/A</p>
            </div>
            <div class="bg-white shadow rounded p-6 text-center">
                <p class="text-sm text-gray-500">Total bases uploaded</p>
                <p class="text-2xl font-bold">0</p>
            </div>
            <div class="bg-white shadow rounded p-6 text-center">
                <p class="text-sm text-gray-500">Total users</p>
                <p class="text-2xl font-bold">0</p>
            </div>
            <div class="bg-white shadow rounded p-6 text-center">
                <p class="text-sm text-gray-500">Total number of web visits</p>
                <p class="text-2xl font-bold">0</p>
            </div>
        </div>
    </div>

    <!-- About Us Section -->
    <div class="py-10 px-6 md:px-16">
        <h2 class="text-center text-3xl font-bold mb-8">About Us</h2>
        <div class="flex flex-col md:flex-row items-center justify-between gap-10">
            <div class="w-full md:w-1/2">
                <img src="{{ asset('images/aboutus-image.jpg') }}" alt="About Us" class="w-full h-auto rounded shadow">
            </div>
            <div class="w-full md:w-1/2">
                <p class="text-gray-700 leading-relaxed">
                    Welcome to COC-Check, the ultimate resource for Clash of Clans players. Search players, clans, and more to stay ahead in the game!
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
