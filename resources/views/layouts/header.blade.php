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
                        <a href="{{ route('bases.index') }}" class="text-white px-4 py-2 block">Bases</a>
                    </li>
                    <li class="bg-orange-500 rounded-lg border border-white">
                        <a href="{{ route('home') }}" class="text-white px-4 py-2 block">Search</a>
                    </li>
                    <li class="bg-orange-500 rounded-lg border border-white">
                        <a href="{{ route('home') }}" class="text-white px-4 py-2 block">Contact</a>
                    </li>
                    @auth
                        <li class="relative bg-[#DB5A42] rounded-lg border border-white group">
                            <a href="#" class="text-white px-4 py-2 block">Account</a>
                            <ul class="absolute hidden text-gray-700 pt-1 group-hover:block z-50">
                                <li class="">
                                    <a href="{{ route('dashboard') }}" class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">Dashboard</a>
                                </li>
                                <li class="">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="relative bg-[#DB5A42] rounded-lg border border-white group">
                            <a href="#" class="text-white px-4 py-2 block">Login</a>
                            <ul class="absolute hidden text-gray-700 pt-1 group-hover:block z-50">
                                <li class="">
                                    <a href="{{ route('login') }}" class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">Login</a>
                                </li>
                                <li class="">
                                    <a href="{{ route('register') }}" class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">Register</a>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </div>
</header>