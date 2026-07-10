<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            font-family: Arial, sans-serif;
        }

        .hero{
            min-height: 100vh;
            display:flex;
            align-items:center;
            background: linear-gradient(135deg,#0d6efd,#0dcaf0);
            color:white;
        }

        .feature-card{
            transition:0.3s;
        }

        .feature-card:hover{
            transform:translateY(-10px);
        }

        footer{
            background:#212529;
            color:white;
            padding:20px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            📦 Peminjaman Barang
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="#fitur" class="nav-link">Fitur</a>
                </li>

                <li class="nav-item">
                    <a href="#tentang" class="nav-link">Tentang</a>
                </li>

                <li class="nav-item">
                    <a href="/login" class="btn btn-light ms-3">
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero -->
<section class="hero">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">
            Sistem Peminjaman Barang
        </h1>

        <p class="lead mt-3">
            Kelola peminjaman barang dengan mudah, cepat, dan terorganisir.
        </p>

        <a href="/login" class="btn btn-light btn-lg mt-3">
            Mulai Sekarang
        </a>
    </div>
</section>

<!-- Fitur -->
<section id="fitur" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">
            Fitur Utama
        </h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card feature-card shadow h-100">
                    <div class="card-body text-center">
                        <h3>📋</h3>
                        <h5>Data Barang</h5>
                        <p>
                            Kelola stok dan data barang secara realtime.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card shadow h-100">
                    <div class="card-body text-center">
                        <h3>📦</h3>
                        <h5>Peminjaman</h5>
                        <p>
                            Catat proses peminjaman dengan mudah.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card shadow h-100">
                    <div class="card-body text-center">
                        <h3>📊</h3>
                        <h5>Laporan</h5>
                        <p>
                            Monitoring peminjaman dan pengembalian barang.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Tentang -->
<section id="tentang" class="bg-light py-5">
    <div class="container text-center">
        <h2>Tentang Aplikasi</h2>

        <p class="mt-3">
            Aplikasi ini dibuat untuk mempermudah pengelolaan barang yang dipinjam,
            mengurangi kehilangan data, serta mempermudah proses monitoring.
        </p>
    </div>
</section>

<!-- Footer -->
<footer class="text-center">
    <p class="mb-0">
        © 2026 Sistem Peminjaman Barang
    </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>