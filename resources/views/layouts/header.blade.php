<!-- filepath: resources/views/layouts/header.blade.php -->
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <div class="flex items-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/COC-logo-v2.png') }}" alt="COC-check logo" style="height: 50px; width: 180px; margin-left: -16px;">
            </a>
            <nav class="ml-6">
                <ul class="flex space-x-4">
                    <li><a href="{{ route('home') }}" class="text-gray-900 hover:text-gray-700">Home</a></li>
                    <li><a href="{{ route('bases') }}" class="text-gray-900 hover:text-gray-700">Bases</a></li>
                    <li><a href="{{ route('search') }}" class="text-gray-900 hover:text-gray-700">Search</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-900 hover:text-gray-700">Contact</a></li>
                </ul>
            </nav>
        </div>
        <div>
            <a href="{{ route('login') }}" class="text-gray-900 hover:text-gray-700">Login</a>
        </div>
    </div>
</header>