<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SppQu App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#0B1A39] text-white">

    <!-- NAVBAR -->
    <nav class="flex justify-between items-center py-5 px-10 bg-[#0F234F] shadow-md">
        <h1 class="text-2xl font-bold text-blue-300">SppQu</h1>

        <div class="space-x-4">
            @auth
                <a href="{{ route('dashboard') }}"
                   class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="px-4 py-2 text-white hover:text-blue-300 transition">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition">
                    Register
                </a>
            @endauth
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="text-center mt-20">
        <h2 class="text-3xl font-bold text-blue-300">Selamat Datang di <span class="text-blue-400">SppQu App</span></h2>

        <p class="mt-3 text-gray-300">
            Aplikasi pembayaran SPP modern untuk sekolah Anda
        </p>

        @auth
            <a href="{{ route('dashboard') }}"
               class="mt-6 inline-block bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-lg text-white font-semibold transition">
                Masuk ke Dashboard
            </a>
        @else
            <a href="{{ route('register') }}"
               class="mt-6 inline-block bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-lg text-white font-semibold transition">
                Daftar Sekarang
            </a>
        @endauth
    </section>

    <!-- FEATURES -->
    <section class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8 px-10">
        
        <div class="bg-[#13264F] p-6 rounded-xl shadow-lg hover:scale-105 transition">
            <h3 class="text-xl font-bold text-blue-300">Mudah Digunakan</h3>
            <p class="mt-2 text-gray-300">Interface yang simpel dan mudah dipahami untuk semua pengguna.</p>
        </div>

        <div class="bg-[#13264F] p-6 rounded-xl shadow-lg hover:scale-105 transition">
            <h3 class="text-xl font-bold text-blue-300">Aman & Terpercaya</h3>
            <p class="mt-2 text-gray-300">Data pembayaran tersimpan dengan aman di database.</p>
        </div>

        <div class="bg-[#13264F] p-6 rounded-xl shadow-lg hover:scale-105 transition">
            <h3 class="text-xl font-bold text-blue-300">Laporan Lengkap</h3>
            <p class="mt-2 text-gray-300">Sistem pelaporan yang detail dan mudah diakses.</p>
        </div>

    </section>

    <!-- FOOTER -->
    <footer class="mt-16 py-6 text-center text-gray-400 border-t border-blue-900">
        © 2025 SppQu — All Rights Reserved
    </footer>

</body>
</html>