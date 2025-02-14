<!-- filepath: resources/views/layouts/footer.blade.php -->
<footer class="bg-white shadow mt-8">
    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/COC-logo-v2.png') }}" alt="COC-check logo" style="height: 50px; width: 180px;">
        </a>
        <p class="text-center text-gray-500 text-xs mx-auto">
            &copy; {{ date('Y') }} COC-check. All rights reserved.
        </p>
        <div class="text-left">
            <p class="text-gray-500 text-xs">Links:</p>
            <p class="text-gray-500 text-xs">Sitemap</p>
            <p class="text-gray-500 text-xs">Privacy</p>
        </div>
    </div>
</footer>