<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran SPP</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">

    {{-- NAVBAR --}}
    <nav class="bg-indigo-600 shadow-lg px-6 py-4 flex justify-between items-center">
        <h1 class="text-white text-xl font-semibold">
            Sistem Pembayaran SPP
        </h1>

        <div class="flex items-center space-x-3">
            <span class="text-white">{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="bg-white text-indigo-600 px-4 py-1 rounded-md font-semibold hover:bg-indigo-100 transition">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="flex">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-white shadow-lg h-screen p-5 hidden md:block">
            <h2 class="font-bold text-lg mb-4 text-gray-700">Menu</h2>

            <ul class="space-y-3">

                <li>
                    <a href="/dashboard" class="block p-3 bg-indigo-100 text-indigo-600 rounded-md hover:bg-indigo-200 transition">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="/siswa" class="block p-3 hover:bg-gray-200 rounded-md transition">
                        Data Siswa
                    </a>
                </li>

                <li>
                    <a href="/kelas" class="block p-3 hover:bg-gray-200 rounded-md transition">
                        Data Kelas
                    </a>
                </li>

                <li>
                    <a href="/spp" class="block p-3 hover:bg-gray-200 rounded-md transition">
                        Data SPP
                    </a>
                </li>

                <li>
                    <a href="/pembayaran" class="block p-3 hover:bg-gray-200 rounded-md transition">
                        Pembayaran
                    </a>
                </li>

                <li>
                    <a href="/laporan" class="block p-3 hover:bg-gray-200 rounded-md transition">
                        Laporan
                    </a>
                </li>

            </ul>
        </aside>

        {{-- CONTENT --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>
