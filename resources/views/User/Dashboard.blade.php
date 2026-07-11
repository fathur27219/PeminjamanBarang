<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f7fb;
        }

        .sidebar{
            min-height:100vh;
            background:#1e293b;
        }

        .sidebar .nav-link{
            color:#cbd5e1;
            padding:12px 15px;
            border-radius:8px;
            margin-bottom:5px;
        }

        .sidebar .nav-link:hover{
            background:#334155;
            color:#fff;
        }

        .sidebar .active{
            background:#0d6efd;
            color:#fff !important;
        }

        .card-custom{
            border:none;
            border-radius:15px;
            box-shadow:0 2px 10px rgba(0,0,0,.05);
        }

        .content-box{
            background:#fff;
            border-radius:15px;
            padding:20px;
            box-shadow:0 2px 10px rgba(0,0,0,.05);
        }
    </style>
</head>
<body>

<div class="container-fluid">

    <div class="row">

     @include('Sidebar.Sidebar')

        <!-- Content -->
        <div class="col-md-10 p-4">

            <!-- Topbar -->
            <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded shadow-sm">

                <h4 class="mb-0">
                    Dashboard User
                </h4>

                <div>
                    👤 {{ Auth::user()->name ?? 'User' }}
                </div>

            </div>

            <!-- Statistik -->
            <div class="row mt-4">

                <div class="col-md-4">
                    <div class="card card-custom">
                        <div class="card-body">
                            <h6>Sedang Dipinjam</h6>
                            <h2>{{ $sedangDipinjam ?? 0 }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custom">
                        <div class="card-body">
                            <h6>Menunggu Approval</h6>
                            <h2>{{ $pending ?? 0 }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custom">
                        <div class="card-body">
                            <h6>Total Riwayat</h6>
                            <h2>{{ $riwayat ?? 0 }}</h2>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Barang Sedang Dipinjam -->
            <div class="content-box mt-4">

                <h5>Barang Yang Sedang Dipinjam</h5>

                <table class="table mt-3">

                    <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Batas Kembali</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>Laptop Asus</td>
                            <td>10 Juli 2026</td>
                            <td>15 Juli 2026</td>
                            <td>
                                <span class="badge bg-success">
                                    Dipinjam
                                </span>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

            <!-- Pengajuan Terbaru -->
            <div class="content-box mt-4">

                <h5>Pengajuan Terbaru</h5>

                <table class="table mt-3">

                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Barang</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>11 Juli 2026</td>
                            <td>Proyektor Epson</td>
                            <td>
                                <span class="badge bg-warning">
                                    Pending
                                </span>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

            <!-- Notifikasi -->
            <div class="content-box mt-4">

                <h5>Notifikasi</h5>

                <div class="alert alert-warning mt-3">
                    ⚠ Barang "Laptop Asus" harus dikembalikan dalam 2 hari.
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>