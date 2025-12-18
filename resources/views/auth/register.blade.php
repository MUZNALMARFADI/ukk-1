<x-guest-layout>

    <style>
        body {
            background: #0b1e3f;
        }

        .register-card {
            background: #10244d;
            border-radius: 20px;
            padding: 35px;
            color: white;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            width: 420px;
            margin: auto;
            margin-top: 60px;
        }

        .register-title {
            font-size: 26px;
            font-weight: 700;
            text-align: center;
            color: #4da3ff;
            margin-bottom: 20px;
        }

        .input-box {
            background: #0d1b36;
            border: 1px solid #1d335f;
            color: white;
            border-radius: 10px;
        }

        .input-box:focus {
            border-color: #4da3ff;
            box-shadow: 0 0 5px #4da3ff;
        }

        .btn-register {
            background: #4da3ff;
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            color: white;
        }

        .btn-register:hover {
            background: #2f86e8;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
        }

        .login-link a {
            color: #4da3ff;
            font-size: 14px;
        }
    </style>

    <div class="register-card">

        <div class="register-title">Register SppQu</div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Nama Lengkap</label>
                <input id="name" type="text" name="name"
                    class="input-box w-full p-2"
                    value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Username -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Username</label>
                <input id="username" type="text" name="username"
                    class="input-box w-full p-2"
                    value="{{ old('username') }}" required>
                @error('username')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Email</label>
                <input id="email" type="email" name="email"
                    class="input-box w-full p-2"
                    value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Password</label>
                <input id="password" type="password" name="password"
                    class="input-box w-full p-2" required>
                @error('password')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    class="input-box w-full p-2" required>
                @error('password_confirmation')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-register">Daftar</button>

            <div class="login-link">
                <span class="text-gray-300">Sudah punya akun?</span>
                <a href="{{ route('login') }}">Login di sini</a>
            </div>

        </form>
    </div>

</x-guest-layout>