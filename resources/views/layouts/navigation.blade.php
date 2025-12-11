<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- LEFT: LOGO + MENU -->
            <div class="flex items-center">

                <!-- LOGO -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                        <x-application-logo class="block h-9 w-auto text-gray-800" />
                        <span class="font-bold text-lg">SPP App</span>
                    </a>
                </div>

                <!-- MAIN MENU -->
                <div class="hidden sm:flex sm:space-x-6 sm:ms-10">

                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    @if(Auth::user()->role == 'admin')
                        <x-nav-link href="{{ route('siswa.index') }}" :active="request()->routeIs('siswa.*')">
                            Siswa
                        </x-nav-link>

                        <x-nav-link href="{{ route('kelas.index') }}" :active="request()->routeIs('kelas.*')">
                            Kelas
                        </x-nav-link>

                        <x-nav-link href="{{ route('spp.index') }}" :active="request()->routeIs('spp.*')">
                            SPP
                        </x-nav-link>
                    @endif

                    <x-nav-link href="{{ route('pembayaran.create') }}" :active="request()->routeIs('pembayaran.create')">
                        Bayar SPP
                    </x-nav-link>

                    <x-nav-link href="{{ route('pembayaran.history') }}" :active="request()->routeIs('pembayaran.history')">
                        History Pembayaran
                    </x-nav-link>
                </div>
            </div>

            <!-- RIGHT: PROFILE DROPDOWN -->
            <div class="hidden sm:flex sm:items-center">

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 rounded-md text-gray-600 hover:text-gray-800 focus:outline-none transition">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ms-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06 0L10 10.91l3.71-3.7a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link href="{{ route('profile.edit') }}">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </x-dropdown-link>
                        </form>

                    </x-slot>
                </x-dropdown>

            </div>

            <!-- MOBILE MENU BUTTON -->
            <div class="flex sm:hidden">
                <button @click="open = !open"
                    class="p-2 rounded-md text-gray-600 hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'block': !open}"
                              class="block"
                              stroke="currentColor" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'block': open}"
                              class="hidden"
                              stroke="currentColor" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- MOBILE MENU -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">

        <div class="pt-3 pb-3 space-y-1 border-t">

            <x-responsive-nav-link href="{{ route('dashboard') }}">
                Dashboard
            </x-responsive-nav-link>

            @if(Auth::user()->role == 'admin')
                <x-responsive-nav-link href="{{ route('siswa.index') }}">Siswa</x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('kelas.index') }}">Kelas</x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('spp.index') }}">SPP</x-responsive-nav-link>
            @endif

            <x-responsive-nav-link href="{{ route('pembayaran.create') }}">Bayar SPP</x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('pembayaran.history') }}">History Pembayaran</x-responsive-nav-link>
        </div>

        <!-- MOBILE PROFILE -->
        <div class="pt-4 pb-1 border-t">
            <div class="px-4">
                <div class="text-base font-medium">{{ Auth::user()->name }}</div>
                <div class="text-sm text-gray-600">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="{{ route('profile.edit') }}">
                    Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Logout
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>

    </div>
</nav>
