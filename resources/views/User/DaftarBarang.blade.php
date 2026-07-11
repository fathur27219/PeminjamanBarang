<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>

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

        .table td, .table th{
            vertical-align: middle;
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
                <h4 class="mb-0">📦 Daftar Barang</h4>
                <div>
                    👤 {{ Auth::user()->name ?? 'User' }}
                </div>
            </div>

            <!-- Content -->
            <div class="content-box mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="mb-0">Data Barang Tersedia</h5>
                        <div class="text-muted" style="font-size: 0.9rem;">Pilih barang untuk mengajukan peminjaman</div>
                    </div>
                    <div class="text-end text-muted" style="font-size: 0.9rem;">
                        Total: {{ ($barangs ?? collect())->count() }}
                    </div>
                </div>

                @php
                    $barangs = $barangs ?? collect();
                @endphp

                @if($barangs->isEmpty())
                    <div class="alert alert-info mb-0">
                        Belum ada data barang.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped mt-2">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Kondisi</th>
                                    <th>Jumlah</th>
                                    <th>Deskripsi</th>
                                    <th style="width: 1%; white-space: nowrap;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barangs as $barang)
                                    <tr>
                                        <td class="fw-semibold">{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->kategori ?? '-' }}</td>
                                        <td>
                                            @php
                                                $kondisi = strtolower(trim($barang->kondisi ?? ''));
                                            @endphp
                                            @if($kondisi === 'baik')
                                                <span class="badge bg-success">Baik</span>
                                            @elseif($kondisi === 'rusak')
                                                <span class="badge bg-danger">Rusak</span>
                                            @elseif($kondisi === 'sedang')
                                                <span class="badge bg-warning text-dark">Sedang</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $barang->kondisi ?? '-' }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $barang->jumlah ?? 0 }}</td>
                                        <td style="max-width: 320px;">{{ Str::limit($barang->deskripsi ?? '-', 80) }}</td>
                                        <td>
                                            <a
                                                href="#"
                                                class="btn btn-sm btn-primary"
                                                role="button"
                                                aria-disabled="true"
                                                title="Route pengajuan peminjaman belum dihubungkan"
                                            >
                                                Ajukan
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

