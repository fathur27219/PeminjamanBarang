@extends('layouts.user')

@section('title', 'Riwayat Peminjaman')

@section('page-title')
Riwayat Peminjaman
@endsection

@section('content')

<div class="container-fluid">

    <div class="card shadow mt-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h5 class="mb-0">
                    Riwayat Peminjaman Barang
                </h5>

                <input
                    type="text"
                    class="form-control w-25"
                    placeholder="Cari barang...">

            </div>

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>
                        <th width="60">No</th>
                        <th>Barang</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($riwayat as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->barang->nama_barang }}</td>

                        <td>{{ $item->tanggal_peminjaman }}</td>

                        <td>{{ $item->tanggal_pengembalian }}</td>

                        <td>

                            @if($item->status == 'returned')

                            <span class="badge bg-success">
                                Sudah Dikembalikan
                            </span>

                            @elseif($item->status == 'rejected')

                            <span class="badge bg-danger">
                                Ditolak
                            </span>

                            @endif

                        </td>

                        <td>{{ $item->deskripsi }}</td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center py-4">

                            Belum ada riwayat peminjaman.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection