<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran SPP</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
        }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="bg-white/90 backdrop-blur-md shadow-sm border-b border-green-100 px-6 py-4 flex justify-between items-center sticky top-0 z-50">
        <h1 class="text-xl font-bold bg-gradient-to-r from-emerald-600 to-green-600 bg-clip-text text-transparent">
            Sistem Pembayaran SPP
        </h1>

        <div class="flex items-center space-x-3">
            <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="bg-gradient-to-r from-emerald-500 to-green-500 text-white px-4 py-2 rounded-lg font-semibold hover:from-emerald-600 hover:to-green-600 transition shadow-md">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="flex">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-white border-r border-green-100 shadow-sm h-screen p-5 hidden md:block">
            <h2 class="font-bold text-lg mb-4 text-gray-700">Menu</h2>

            <ul class="space-y-2">

                <li>
                    <a href="/dashboard" class="block p-3 rounded-lg transition {{ request()->is('dashboard') ? 'bg-gradient-to-r from-emerald-500 to-green-500 text-white shadow-md' : 'hover:bg-green-50 text-gray-700' }}">
                        📊 Dashboard
                    </a>
                </li>

                <li>
                    <a href="/siswa" class="block p-3 rounded-lg transition {{ request()->is('siswa*') ? 'bg-gradient-to-r from-emerald-500 to-green-500 text-white shadow-md' : 'hover:bg-green-50 text-gray-700' }}">
                        👥 Data Siswa
                    </a>
                </li>

                <li>
                    <a href="/kelas" class="block p-3 rounded-lg transition {{ request()->is('kelas*') ? 'bg-gradient-to-r from-emerald-500 to-green-500 text-white shadow-md' : 'hover:bg-green-50 text-gray-700' }}">
                        🏫 Data Kelas
                    </a>
                </li>

                <li>
                    <a href="/spp" class="block p-3 rounded-lg transition {{ request()->is('spp*') ? 'bg-gradient-to-r from-emerald-500 to-green-500 text-white shadow-md' : 'hover:bg-green-50 text-gray-700' }}">
                        💰 Data SPP
                    </a>
                </li>

                <li>
                    <a href="/pembayaran" class="block p-3 rounded-lg transition {{ request()->is('pembayaran*') ? 'bg-gradient-to-r from-emerald-500 to-green-500 text-white shadow-md' : 'hover:bg-green-50 text-gray-700' }}">
                        💳 Pembayaran
                    </a>
                </li>

                <li>
                    <a href="/laporan" class="block p-3 rounded-lg transition {{ request()->is('laporan*') ? 'bg-gradient-to-r from-emerald-500 to-green-500 text-white shadow-md' : 'hover:bg-green-50 text-gray-700' }}">
                        📋 Laporan
                    </a>
                </li>

            </ul>
        </aside>

        {{-- CONTENT --}}
        <main class="flex-1 p-6">
            @if(session('success'))
                <div class="mb-4 p-4 bg-gradient-to-r from-emerald-50 to-green-50 border-l-4 border-emerald-500 text-emerald-700 rounded-lg">
                    ✓ {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>

</body>
</html>