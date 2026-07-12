<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan semua barang
    public function index()
    {
        $barangs = Barang::latest()->get();

        return view('Admin.Barang.Index', compact('barangs'));
    }

    // Menampilkan form tambah barang
    public function create()
    {
        return view('Admin.Barang.Create');
    }

    // Menyimpan barang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|max:255',
            'kategori'    => 'required|max:100',
            'jumlah'      => 'required|integer|min:1',
            'kondisi'     => 'required',
            'deskripsi'   => 'nullable',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori'    => $request->kategori,
            'jumlah'      => $request->jumlah,
            'kondisi'     => $request->kondisi,
            'deskripsi'   => $request->deskripsi,
        ]);

        return redirect()
            ->route('admin.barang.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);

        return view('Admin.Barang.Edit', compact('barang'));
    }

    // Update data barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|max:255',
            'kategori'    => 'required|max:100',
            'jumlah'      => 'required|integer|min:1',
            'kondisi'     => 'required',
            'deskripsi'   => 'nullable',
        ]);

        $barang = Barang::findOrFail($id);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'kategori'    => $request->kategori,
            'jumlah'      => $request->jumlah,
            'kondisi'     => $request->kondisi,
            'deskripsi'   => $request->deskripsi,
        ]);

        return redirect()
            ->route('admin.barang.index')
            ->with('success', 'Barang berhasil diubah.');
    }

    // Hapus barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        $barang->delete();

        return redirect()
            ->route('admin.barang.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}