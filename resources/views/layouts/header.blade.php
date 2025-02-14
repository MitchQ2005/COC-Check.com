<!-- filepath: resources/views/layouts/header.blade.php -->
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <div class="flex items-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/COC-logo-v2.png') }}" alt="COC-check logo" style="height: 50px; width: 180px; margin-left: -16px;">
            </a>
        </div>
        <div class="flex items-center space-x-6">
            <nav>
                <ul class="flex space-x-8">
                    <li class="bg-orange-500 rounded-lg border border-white">
                        <a href="{{ route('home') }}" class="text-white px-4 py-2 block">Home</a>
                    </li>
                    <li class="bg-orange-500 rounded-lg border border-white">
                        <a href="{{ route('bases') }}" class="text-white px-4 py-2 block">Bases</a>
                    </li>
                    <li class="bg-orange-500 rounded-lg border border-white">
                        <a href="{{ route('search') }}" class="text-white px-4 py-2 block">Search</a>
                    </li>
                    <li class="bg-orange-500 rounded-lg border border-white">
                        <a href="{{ route('contact') }}" class="text-white px-4 py-2 block">Contact</a>
                    </li>
                    <li class="bg-[#DB5A42] rounded-lg border border-white">
                        <a href="{{ route('login') }}" class="text-white px-4 py-2 block">Login</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>