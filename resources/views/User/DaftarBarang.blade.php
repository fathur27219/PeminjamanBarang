@extends('layouts.user')

@section('title','Peminjaman')

@section('page-title')
Daftar Barang
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">


        <!-- Content -->
        <div class="col-md-10 p-4">

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
@endsection