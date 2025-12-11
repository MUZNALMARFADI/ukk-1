<!DOCTYPE html>
<html lang="en" class="{{ session('dark_mode') ? 'dark' : '' }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>@yield('title', 'Sistem Pembayaran SPP')</title>

  {{-- Tailwind CDN --}}
  <script src="https://cdn.tailwindcss.com"></script>

  {{-- Google Font --}}
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style> body { font-family: 'Poppins', sans-serif; } </style>

  {{-- Chart.js --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    /* Smooth transitions for dark mode */
    .dark-transition { transition: background-color .25s, color .25s; }
  </style>

  @stack('head')
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">

  {{-- NAVBAR --}}
  <nav class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16 items-center">
        <div class="flex items-center space-x-4">
          <button id="btn-sidebar-toggle" class="md:hidden p-2 rounded hover:bg-gray-100">
            <!-- hamburger -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
          </button>
          <a href="{{ route('dashboard') }}" class="text-indigo-600 text-lg font-semibold">SPP • Sekolah</a>
        </div>

        <div class="flex items-center space-x-4">
          {{-- Dark mode toggle --}}
          <button id="btn-dark" class="p-2 rounded hover:bg-gray-100" title="Toggle dark mode">
            <svg id="icon-sun" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M10 4.5a.75.75 0 01.75-.75h.5a.75.75 0 010 1.5h-.5A.75.75 0 0110 4.5zM10 15.25a.75.75 0 01.75-.75h.5a.75.75 0 010 1.5h-.5a.75.75 0 01-.75-.75zM4.5 10a.75.75 0 01.75-.75v-.5a.75.75 0 011.5 0v.5A.75.75 0 017 10h-.75A.75.75 0 016 10a.75.75 0 01-1.5 0h.0z"/></svg>
            <svg id="icon-moon" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 116.707 2.707 7 7 0 1017.293 13.293z"/></svg>
          </button>

          {{-- User --}}
          <div class="flex items-center space-x-3">
            <span class="hidden sm:inline">{{ Auth::user() ? Auth::user()->name : 'Guest' }}</span>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="bg-indigo-600 text-white px-3 py-1 rounded hover:bg-indigo-700">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <div class="flex">
    {{-- SIDEBAR --}}
    <aside id="sidebar" class="w-64 bg-white border-r min-h-screen hidden md:block">
      <div class="p-4">
        <div class="font-semibold text-lg text-gray-700 mb-4">Menu</div>
        <ul class="space-y-2 text-sm">
          <li><a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Dashboard</a></li>
          <li><a href="{{ route('siswa.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Data Siswa</a></li>
          <li><a href="{{ route('kelas.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Data Kelas</a></li>
          <li><a href="{{ route('spp.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Data SPP</a></li>
          <li><a href="{{ route('pembayaran.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Pembayaran</a></li>
          <li><a href="{{ route('laporan.index') }}" class="block px-3 py-2 rounded bg-indigo-50">Laporan</a></li>
        </ul>
      </div>
    </aside>

    {{-- MAIN --}}
    <main class="flex-1 p-6">
      @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
      @endif
      @yield('content')
    </main>
  </div>

  <script>
    // Sidebar mobile toggle
    document.getElementById('btn-sidebar-toggle')?.addEventListener('click', function(){
      const s = document.getElementById('sidebar');
      if(!s) return;
      s.classList.toggle('hidden');
    });

    // Dark mode persist
    const btn = document.getElementById('btn-dark');
    const iconSun = document.getElementById('icon-sun');
    const iconMoon = document.getElementById('icon-moon');

    function setDark(isDark){
      if(isDark){
        document.documentElement.classList.add('dark');
        iconSun.classList.remove('hidden');
        iconMoon.classList.add('hidden');
        localStorage.setItem('spp_dark','1');
      } else {
        document.documentElement.classList.remove('dark');
        iconSun.classList.add('hidden');
        iconMoon.classList.remove('hidden');
        localStorage.removeItem('spp_dark');
      }
    }

    // initial
    setDark(localStorage.getItem('spp_dark') === '1');

    btn?.addEventListener('click', function(){
      setDark(!(document.documentElement.classList.contains('dark')));
      // optionally you could persist on server via fetch to an endpoint
    });
  </script>

  @stack('scripts')
</body>
</html>
