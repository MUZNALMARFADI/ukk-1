<x-guest-layout>

    <style>
        body {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            font-family: 'Inter', sans-serif;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(16, 185, 129, 0.1);
            width: 100%;
            max-width: 440px;
            margin: auto;
            border: 1px solid #d1fae5;
        }

        .login-title {
            font-size: 32px;
            font-weight: 800;
            text-align: center;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 8px;
        }

        .login-subtitle {
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

        .btn-login {
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

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }

        .forgot-link {
            text-align: right;
            margin-top: 12px;
            margin-bottom: 24px;
        }

        .forgot-link a {
            color: #10b981;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s;
        }

        .forgot-link a:hover {
            color: #059669;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 24px 0;
            color: #9ca3af;
            font-size: 13px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #d1fae5;
        }

        .divider span {
            padding: 0 12px;
        }

        .register-link {
            text-align: center;
            color: #6b7280;
            font-size: 14px;
        }

        .register-link a {
            color: #10b981;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }

        .register-link a:hover {
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

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>

    <div class="login-card">

        <div class="icon-wrapper">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
        </div>

        <div class="login-title">Selamat Datang</div>
        <div class="login-subtitle">Masuk ke akun SppQu Anda</div>

        @if ($errors->any())
            <div class="alert-error">
                <strong>Oops!</strong> {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="input-group">
                <label class="input-label">Email</label>
                <input id="email" type="email" name="email"
                    class="input-box"
                    placeholder="nama@example.com"
                    value="{{ old('email') }}"
                    required autofocus>
            </div>

            <!-- Password -->
            <div class="input-group">
                <label class="input-label">Password</label>
                <input id="password" type="password" name="password"
                    class="input-box"
                    placeholder="Masukkan password Anda"
                    required>
            </div>

            <div class="forgot-link">
                <a href="{{ route('password.request') }}">Lupa password?</a>
            </div>

            <button type="submit" class="btn-login">
                Masuk ke Dashboard
            </button>

            <div class="divider">
                <span>atau</span>
            </div>

            <div class="register-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
            </div>

        </form>
    </div>

</x-guest-layout>