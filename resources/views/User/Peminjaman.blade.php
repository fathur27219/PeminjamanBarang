@extends('layouts.user')

@section('title','Peminjaman')

@section('page-title')
Ajukan Peminjaman
@endsection

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-end mb-4">

        <a href="#" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Ajukan
        </a>

    </div>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Status</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Keterangan</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($peminjaman as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->barang->nama_barang }}</td>

                        <td>

                            @if($item->status=='pending')

                            <span class="badge bg-warning">
                                Pending
                            </span>

                            @elseif($item->status=='approved')

                            <span class="badge bg-success">
                                Approved
                            </span>

                            @elseif($item->status=='returned')

                            <span class="badge bg-primary">
                                Returned
                            </span>

                            @else

                            <span class="badge bg-danger">
                                Rejected
                            </span>

                            @endif

                        </td>

                        <td>{{ $item->tanggal_peminjaman }}</td>

                        <td>{{ $item->tanggal_pengembalian }}</td>

                        <td>{{ $item->deskripsi }}</td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            Belum ada data peminjaman.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection