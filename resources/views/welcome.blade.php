<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SppQu - Sistem Pembayaran SPP Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(0,0,0,0.3); }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-violet-900 min-h-screen">

    <!-- NAVBAR -->
    <nav class="backdrop-blur-md bg-white/10 border-b border-white/20 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-purple-500 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-white">SppQu</h1>
                </div>

                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}"
                           class="px-6 py-2.5 bg-white text-purple-600 rounded-xl font-semibold hover:bg-gray-100 transition shadow-lg">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="px-6 py-2.5 text-white hover:text-purple-200 transition font-medium">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                           class="px-6 py-2.5 bg-white text-purple-600 rounded-xl font-semibold hover:bg-gray-100 transition shadow-lg">
                            Daftar Gratis
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="max-w-7xl mx-auto px-6 py-20">
        <div class="text-center">
            <div class="inline-block mb-4 px-4 py-2 bg-purple-500/20 backdrop-blur-sm border border-purple-400/30 rounded-full">
                <span class="text-purple-200 text-sm font-medium">✨ Solusi Pembayaran SPP Terpercaya</span>
            </div>
            
            <h2 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                Kelola Pembayaran SPP<br/>
                <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                    Lebih Mudah & Efisien
                </span>
            </h2>

            <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto">
                Platform pembayaran SPP modern yang membantu sekolah mengelola transaksi dengan cepat, aman, dan transparan
            </p>

            @auth
                <a href="{{ route('dashboard') }}"
                   class="inline-block px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl font-semibold text-lg hover:shadow-2xl hover:scale-105 transition transform">
                    Masuk ke Dashboard →
                </a>
            @else
                <a href="{{ route('register') }}"
                   class="inline-block px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl font-semibold text-lg hover:shadow-2xl hover:scale-105 transition transform">
                    Mulai Sekarang - Gratis →
                </a>
            @endauth
        </div>
    </section>

    <!-- FEATURES -->
    <section class="max-w-7xl mx-auto px-6 pb-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="card-hover bg-white/10 backdrop-blur-md p-8 rounded-2xl border border-white/20">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-3">Proses Cepat</h3>
                <p class="text-gray-300 leading-relaxed">
                    Interface intuitif yang memungkinkan input dan konfirmasi pembayaran dalam hitungan detik
                </p>
            </div>

            <div class="card-hover bg-white/10 backdrop-blur-md p-8 rounded-2xl border border-white/20">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-3">Keamanan Terjamin</h3>
                <p class="text-gray-300 leading-relaxed">
                    Data pembayaran terenkripsi dan tersimpan aman dengan sistem backup otomatis
                </p>
            </div>

            <div class="card-hover bg-white/10 backdrop-blur-md p-8 rounded-2xl border border-white/20">
                <div class="w-14 h-14 bg-gradient-to-br from-pink-400 to-pink-600 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-3">Laporan Real-time</h3>
                <p class="text-gray-300 leading-relaxed">
                    Dashboard analitik lengkap dengan laporan pembayaran yang detail dan mudah dipahami
                </p>
            </div>

        </div>
    </section>

    <!-- STATS SECTION -->
    <section class="max-w-7xl mx-auto px-6 pb-20">
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl p-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div>
                    <div class="text-5xl font-bold text-white mb-2">99.9%</div>
                    <div class="text-blue-100">Uptime Sistem</div>
                </div>
                <div>
                    <div class="text-5xl font-bold text-white mb-2">500+</div>
                    <div class="text-blue-100">Sekolah Terdaftar</div>
                </div>
                <div>
                    <div class="text-5xl font-bold text-white mb-2">50K+</div>
                    <div class="text-blue-100">Transaksi/Bulan</div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="border-t border-white/10 backdrop-blur-md bg-white/5">
        <div class="max-w-7xl mx-auto px-6 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-purple-500 rounded-lg"></div>
                    <span class="text-white font-semibold">SppQu © 2025</span>
                </div>
                <div class="text-gray-400 text-sm">
                    Dibuat dengan ❤️ untuk pendidikan Indonesia
                </div>
            </div>
        </div>
    </footer>

</body>
</html>