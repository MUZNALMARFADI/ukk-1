<x-guest-layout>

    <style>
        body {
            background: #0b1e3f;
        }

        .login-card {
            background: #10244d;
            border-radius: 20px;
            padding: 35px;
            color: white;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            width: 420px;
            margin: auto;
            margin-top: 60px;
        }

        .login-title {
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

        .btn-login {
            background: #4da3ff;
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            color: white;
        }

        .btn-login:hover {
            background: #2f86e8;
        }

        .forgot {
            text-align: right;
            margin-top: 5px;
        }

        .forgot a {
            color: #4da3ff;
            font-size: 14px;
        }
    </style>

    <div class="login-card">

        <div class="login-title">Login SppQu</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label class="block font-semibold">Email</label>
                <input id="email" type="email" name="email"
                    class="input-box w-full p-2 mt-1"
                    required autofocus>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block font-semibold">Password</label>
                <input id="password" type="password" name="password"
                    class="input-box w-full p-2 mt-1"
                    required>
            </div>

            <div class="forgot mb-4">
                <a href="{{ route('password.request') }}">Lupa Password?</a>
            </div>

            <button class="btn-login">Masuk</button>

        </form>
    </div>

</x-guest-layout>