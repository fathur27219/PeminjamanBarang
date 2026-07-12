@extends('layouts.user')

@section('title', isset($peminjaman) ? 'Edit Peminjaman' : 'Ajukan Peminjaman')

@section('page-title')
{{ isset($peminjaman) ? 'Edit Peminjaman' : 'Ajukan Peminjaman' }}
@endsection

@section('content')
<div class="container-fluid">

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ isset($peminjaman) ? route('user.peminjaman.update', $peminjaman) : route('user.peminjaman.store') }}" method="POST">
                @csrf
                @if(isset($peminjaman))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Pilih Barang</label>
                    <select name="barang_id" class="form-select @error('barang_id') is-invalid @enderror">
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}" {{ old('barang_id', $peminjaman->barang_id ?? '') == $barang->id ? 'selected' : '' }}>
                                {{ $barang->nama_barang }}
                            </option>
                        @endforeach
                    </select>
                    @error('barang_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Peminjam</label>
                    <select name="peminjam_id" class="form-select @error('peminjam_id') is-invalid @enderror">
                        <option value="">-- Pilih Peminjam --</option>
                        @foreach($peminjams as $peminjam)
                            <option value="{{ $peminjam->id }}" {{ old('peminjam_id', $peminjaman->peminjam_id ?? '') == $peminjam->id ? 'selected' : '' }}>
                                {{ $peminjam->nama_peminjam }}
                            </option>
                        @endforeach
                    </select>
                    @error('peminjam_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Peminjaman</label>
                        <input type="datetime-local" name="tanggal_peminjaman" class="form-control @error('tanggal_peminjaman') is-invalid @enderror" value="{{ old('tanggal_peminjaman', isset($peminjaman) ? date('Y-m-d\TH:i', strtotime($peminjaman->tanggal_peminjaman)) : '') }}">
                        @error('tanggal_peminjaman')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Kembali</label>
                        <input type="datetime-local" name="tanggal_pengembalian" class="form-control @error('tanggal_pengembalian') is-invalid @enderror" value="{{ old('tanggal_pengembalian', isset($peminjaman) ? date('Y-m-d\TH:i', strtotime($peminjaman->tanggal_pengembalian)) : '') }}">
                        @error('tanggal_pengembalian')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi', $peminjaman->deskripsi ?? '') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @if(isset($peminjaman))
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            @foreach(['pending', 'approved', 'returned', 'rejected'] as $status)
                                <option value="{{ $status }}" {{ old('status', $peminjaman->status) == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endif

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('user.peminjaman.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
