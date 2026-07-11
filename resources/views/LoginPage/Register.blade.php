<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Peminjaman Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#0d6efd,#0dcaf0);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .register-card{
            width:100%;
            max-width:450px;
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

        .form-control{
            border-radius:10px;
            padding:12px;
        }

        .btn-register{
            width:100%;
            padding:12px;
            border-radius:10px;
        }

        .card-footer{
            background:white;
            text-align:center;
        }
    </style>
</head>
<body>

<div class="card shadow-lg register-card">

    <div class="card-header">
        <div class="logo">📦</div>
        <h3 class="mt-2">Daftar Akun</h3>
        <small>Sistem Peminjaman Barang</small>
    </div>

    <div class="card-body p-4">

        <form action="{{route('register.store')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Masukkan nama lengkap"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Masukkan email"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password"
                    required>
            </div>

            <div class="mb-4">
                <label class="form-label">Konfirmasi Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Konfirmasi password"
                    required>
            </div>

            <button type="submit" class="btn btn-success btn-register">
                Daftar
            </button>

        </form>

    </div>

    <div class="card-footer">
        Sudah punya akun?
        <a href="{{ route('login') }}">Login</a>
    </div>

</div>

</body>
</html>