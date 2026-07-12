@extends('layouts.admin')

@section('title','Tambah Barang')

@section('page-title')
Tambah Barang
@endsection

@section('content')

<div class="container-fluid">

<div class="card shadow">

<div class="card-body">

<form action="{{ route('admin.barang.store') }}" method="POST">

@csrf

<div class="mb-3">

<label>Nama Barang</label>

<input
type="text"
name="nama_barang"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Kategori</label>

<input
type="text"
name="kategori"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Jumlah</label>

<input
type="number"
name="jumlah"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Kondisi</label>

<select
name="kondisi"
class="form-control">

<option value="Baik">Baik</option>

<option value="Rusak Ringan">Rusak Ringan</option>

<option value="Rusak Berat">Rusak Berat</option>

</select>

</div>

<div class="mb-3">

<label>Deskripsi</label>

<textarea
name="deskripsi"
class="form-control"
rows="4"></textarea>

</div>

<button class="btn btn-success">

Simpan

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