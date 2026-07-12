@extends('layouts.admin')

@section('title','Edit Barang')

@section('page-title')
Edit Barang
@endsection

@section('content')

<div class="container-fluid">

<div class="card shadow">

<div class="card-body">

<form action="{{ route('admin.barang.update',$barang->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label>Nama Barang</label>

<input
type="text"
name="nama_barang"
class="form-control"
value="{{ $barang->nama_barang }}"
required>

</div>

<div class="mb-3">

<label>Kategori</label>

<input
type="text"
name="kategori"
class="form-control"
value="{{ $barang->kategori }}"
required>

</div>

<div class="mb-3">

<label>Jumlah</label>

<input
type="number"
name="jumlah"
class="form-control"
value="{{ $barang->jumlah }}"
required>

</div>

<div class="mb-3">

<label>Kondisi</label>

<select
name="kondisi"
class="form-control">

<option value="Baik" {{ $barang->kondisi=='Baik' ? 'selected' : '' }}>Baik</option>

<option value="Rusak Ringan" {{ $barang->kondisi=='Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>

<option value="Rusak Berat" {{ $barang->kondisi=='Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>

</select>

</div>

<div class="mb-3">

<label>Deskripsi</label>

<textarea
name="deskripsi"
class="form-control"
rows="4">{{ $barang->deskripsi }}</textarea>

</div>

<button class="btn btn-primary">

Update

</button>

<a href="{{ route('admin.barang.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

@endsection