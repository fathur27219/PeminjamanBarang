@extends('layouts.admin')

@section('title','Peminjaman')

@section('page-title')
Dashboard
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">

        <!-- Content -->
        <div class="col-md-10 p-4">

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
@endsection