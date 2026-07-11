<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Peminjaman Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#0d6efd,#0dcaf0);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-card{
            width:100%;
            max-width:420px;
            border:none;
            border-radius:20px;
            overflow:hidden;
        }

        .card-header{
            background:#0d6efd;
            color:white;
            text-align:center;
            padding:25px;
        }

        .logo{
            font-size:60px;
        }

        .btn-login{
            width:100%;
            padding:12px;
            border-radius:10px;
        }

        .form-control{
            border-radius:10px;
            padding:12px;
        }

        .card-footer{
            background:white;
            text-align:center;
        }
    </style>
</head>
<body>

<div class="card shadow-lg login-card">

    <div class="card-header">
        <div class="logo">📦</div>
        <h3 class="mt-2">Peminjaman Barang</h3>
        <small>Silakan login untuk melanjutkan</small>
    </div>

    <div class="card-body p-4">

        <form action="#" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    placeholder="Masukkan email">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control"
                    placeholder="Masukkan password">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input">
                <label class="form-check-label">
                    Ingat Saya
                </label>
            </div>

            <button type="submit" class="btn btn-primary btn-login">
                Login
            </button>

        </form>

    </div>

    <div class="card-footer">
        Belum punya akun?
        <a href="{{ route('register') }}">Daftar</a>
    </div>

</div>

</body>
</html>