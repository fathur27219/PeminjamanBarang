@extends('layouts.user')

@section('title','Peminjaman')

@section('page-title')
Ajukan Peminjaman
@endsection

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center gap-3 mb-4 p-3 bg-white rounded shadow-sm">
        <div>
            <h2 class="h5 mb-1 fw-bold">Daftar Peminjaman</h2>
            <p class="mb-0 text-secondary">Semua pengajuan peminjaman barang ditampilkan di sini. Kelola, sunting, atau hapus dengan cepat.</p>
        </div>
        <a href="{{ route('user.peminjaman.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-circle me-2"></i> Tambah Peminjaman
        </a>
    </div>

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Peminjam</th>
                            <th>Status</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    @forelse($peminjaman as $item)

                    <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                            <td>{{ $item->peminjam->nama_peminjam ?? '-' }}</td>
                            <td>
                                @if($item->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($item->status == 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @elseif($item->status == 'returned')
                                    <span class="badge bg-primary">Returned</span>
                                @else
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </td>
                            <td>{{ $item->tanggal_peminjaman }}</td>
                            <td>{{ $item->tanggal_pengembalian }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('user.peminjaman.edit', $item) }}" class="btn btn-sm btn-outline-primary me-1">Edit</a>
                                <form action="{{ route('user.peminjaman.destroy', $item) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus pengajuan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty

                    <tr>

                        <td colspan="8" class="text-center">

                            Belum ada data peminjaman.

                        </td>
             
                    </tr>
    
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection