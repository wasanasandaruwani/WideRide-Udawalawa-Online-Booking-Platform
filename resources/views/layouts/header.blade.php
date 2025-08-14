<nav class="bg-gray-900 text-white py-4 shadow sticky top-0 z-50 transition-all duration-300" x-data="{ mobileOpen: false, dropdownOpen: false }">
    <div class="container mx-auto flex justify-between items-center px-4">
        <a href="/" class="text-2xl font-bold text-yellow-400 tracking-wide hover:scale-105 transition-transform duration-200">Wild Ride Udawalawe</a>
        <div class="space-x-6 hidden md:inline-block">
            <a href="/" class="hover:text-yellow-400 relative group transition-colors duration-200 {{ request()->is('/') ? 'text-yellow-400 font-bold' : '' }}">
                Home
                <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-yellow-400 transition-all group-hover:w-full {{ request()->is('/') ? 'w-full' : '' }}"></span>
            </a>
            <a href="{{ url('/safari') }}" class="hover:text-yellow-400 relative group transition-colors duration-200 {{ request()->is('safari') ? 'text-yellow-400 font-bold' : '' }}">
                Safari Packages
                <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-yellow-400 transition-all group-hover:w-full {{ request()->is('safari') ? 'w-full' : '' }}"></span>
            </a>
            <a href="{{ url('/about') }}" class="hover:text-yellow-400 relative group transition-colors duration-200 {{ request()->is('about') ? 'text-yellow-400 font-bold' : '' }}">
                About Us
                <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-yellow-400 transition-all group-hover:w-full {{ request()->is('about') ? 'w-full' : '' }}"></span>
            </a>
            <a href="{{ url('/contact') }}" class="hover:text-yellow-400 relative group transition-colors duration-200 {{ request()->is('contact') ? 'text-yellow-400 font-bold' : '' }}">
                Contact
                <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-yellow-400 transition-all group-hover:w-full {{ request()->is('contact') ? 'w-full' : '' }}"></span>
            </a>
            <a href="{{ route('bookings.create') }}" class="hover:text-yellow-400 relative group transition-colors duration-200 {{ request()->is('bookings/create') ? 'text-yellow-400 font-bold' : '' }}">
                Book Now
                <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-yellow-400 transition-all group-hover:w-full {{ request()->is('bookings/create') ? 'w-full' : '' }}"></span>
            </a>
            @auth
                <a href="{{ url('/dashboard') }}" class="hover:text-yellow-400">Dashboard</a>
                
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-red-400 ml-4 bg-transparent border-none cursor-pointer">Log Out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-yellow-400">Login</a>
                <a href="{{ route('register') }}" class="hover:text-green-400 border border-green-400 rounded px-4 py-1 ml-2 transition duration-300">Register</a>
            @endauth
        </div>
        <!-- Mobile menu button -->
        <button @click="mobileOpen = !mobileOpen" class="md:hidden focus:outline-none p-2 rounded hover:bg-gray-800 transition">
            <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <!-- Dropdown -->
        <div class="relative inline-block text-left ml-4" x-data="{ open: false }">
            <button @click="open = !open" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-700 shadow-sm px-4 py-2 bg-yellow-500 text-sm font-medium text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400" aria-haspopup="true" :aria-expanded="open">
                More Details
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.584l3.71-3.354a.75.75 0 111.02 1.1l-4.25 3.85a.75.75 0 01-1.02 0l-4.25-3.85a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
            </button>
            <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50" x-transition>
                <div class="py-1" role="menu" aria-orientation="vertical">
                    <a href="{{ url('/animals') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-100 hover:text-yellow-900" role="menuitem">Animal Page</a>
                    <a href="{{ url('/places') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-100 hover:text-yellow-900" role="menuitem">Places Page</a>
                    <a href="{{ url('/hotels') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-100 hover:text-yellow-900" role="menuitem" id="hotels-link">Hotels Page</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile menu -->
    <div x-show="mobileOpen" class="md:hidden bg-gray-900 px-4 pb-4 pt-2 space-y-2 animate-fade-in-down" x-transition>
        <a href="/" class="block py-2 hover:text-yellow-400">Home</a>
        <a href="{{ url('/safari') }}" class="block py-2 hover:text-yellow-400">Safari Packages</a>
        <a href="{{ url('/about') }}" class="block py-2 hover:text-yellow-400">About Us</a>
        <a href="{{ url('/contact') }}" class="block py-2 hover:text-yellow-400">Contact</a>
        <a href="{{ route('bookings.create') }}" class="block py-2 hover:text-yellow-400">Book Now</a>
        @auth
            <a href="{{ url('/dashboard') }}" class="block py-2 hover:text-yellow-400">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" class="block">
                @csrf
                <button type="submit" class="hover:text-red-400 bg-transparent border-none cursor-pointer">Log Out</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block py-2 hover:text-yellow-400">Login</a>
            <a href="{{ route('register') }}" class="block py-2 hover:text-green-400">Register</a>
        @endauth
    </div>
</nav>