<!DOCTYPE html>
<html lang="id">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Website Profil Desa Duwet</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-image: url('{{ asset('images/gambar-desa.jpg') }}');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay {
            background-color: rgba(0, 40, 20, 0.6);
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 40px 35px;
            width: 100%;
            max-width: 380px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .login-box img.logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .login-box h1 {
            font-size: 20px;
            color: #1b4332;
            margin-bottom: 4px;
        }

        .login-box p.subtitle {
            font-size: 13px;
            color: #6c757d;
            margin-bottom: 25px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2d6a4f;
        }

        .btn-login {
            width: 100%;
            padding: 11px;
            background-color: #2d6a4f;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
        }

        .btn-login:hover {
            background-color: #1b4332;
        }

        .error-box {
            background-color: #f8d7da;
            color: #842029;
            padding: 10px;
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 16px;
            text-align: left;
        }
        @media (max-width: 480px) {
            .login-box {
                padding: 30px 22px;
                margin: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div class="login-box">
            <img src="{{ asset('images/logo-desa.png') }}" alt="Logo Desa Duwet" class="logo">
            <h1>Reset Password</h1>
            <p class="subtitle">Masukkan password baru kamu</p>

            @if ($errors->any())
                <div class="error-box">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $email) }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <button type="submit" class="btn-login">Simpan Password Baru</button>
            </form>
        </div>
    </div>
</body>
</html>