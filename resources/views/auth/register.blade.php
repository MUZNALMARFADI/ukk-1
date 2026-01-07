<x-guest-layout>

    <style>
        body {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            font-family: 'Inter', sans-serif;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(16, 185, 129, 0.1);
            width: 100%;
            max-width: 480px;
            margin: auto;
            margin-top: 40px;
            margin-bottom: 40px;
            border: 1px solid #d1fae5;
        }

        .register-title {
            font-size: 32px;
            font-weight: 800;
            text-align: center;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 8px;
        }

        .register-subtitle {
            text-align: center;
            color: #6b7280;
            margin-bottom: 32px;
            font-size: 14px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .input-box {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #d1fae5;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s;
            background: white;
        }

        .input-box:focus {
            outline: none;
            border-color: #10b981;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .btn-register {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            color: white;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }

        .login-link {
            text-align: center;
            color: #6b7280;
            font-size: 14px;
            margin-top: 24px;
        }

        .login-link a {
            color: #10b981;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }

        .login-link a:hover {
            color: #059669;
        }

        .icon-wrapper {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }

        .error-text {
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
            display: block;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        @media (max-width: 640px) {
            .grid-2 {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="register-card">

        <div class="icon-wrapper">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
        </div>

        <div class="register-title">Buat Akun Baru</div>
        <div class="register-subtitle">Daftar untuk mulai menggunakan SppQu</div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="input-group">
                <label class="input-label">Nama Lengkap</label>
                <input id="name" type="text" name="name"
                    class="input-box"
                    placeholder="Masukkan nama lengkap"
                    value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Username -->
            <div class="input-group">
                <label class="input-label">Username</label>
                <input id="username" type="text" name="username"
                    class="input-box"
                    placeholder="Pilih username unik"
                    value="{{ old('username') }}" required>
                @error('username')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="input-group">
                <label class="input-label">Email</label>
                <input id="email" type="email" name="email"
                    class="input-box"
                    placeholder="nama@example.com"
                    value="{{ old('email') }}" required>
                @error('email')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid-2">
                <!-- Password -->
                <div class="input-group">
                    <label class="input-label">Password</label>
                    <input id="password" type="password" name="password"
                        class="input-box"
                        placeholder="Min. 8 karakter" required>
                    @error('password')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="input-group">
                    <label class="input-label">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="input-box"
                        placeholder="Ulangi password" required>
                    @error('password_confirmation')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn-register">
                Daftar Sekarang
            </button>

            <div class="login-link">
                Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
            </div>

        </form>
    </div>

</x-guest-layout>