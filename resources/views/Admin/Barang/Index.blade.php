@extends('layouts.admin')

@section('title','Kelola Barang')

@section('page-title')
Kelola Barang
@endsection

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">

        <a href="{{ route('admin.barang.create') }}" class="btn btn-primary">
            + Tambah Barang
        </a>

    </div>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>
                        <th width="60">No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                        <th>Deskripsi</th>
                        <th width="170">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($barangs as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->nama_barang }}</td>

                        <td>{{ $item->kategori }}</td>

                        <td>{{ $item->jumlah }}</td>

                        <td>{{ $item->kondisi }}</td>

                        <td>{{ $item->deskripsi }}</td>

                        <td>

                            <a href="{{ route('admin.barang.edit',$item->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form
                                action="{{ route('admin.barang.destroy',$item->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Yakin ingin menghapus barang ini?')"
                                    class="btn btn-danger btn-sm">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center">

                            Belum ada data barang.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection