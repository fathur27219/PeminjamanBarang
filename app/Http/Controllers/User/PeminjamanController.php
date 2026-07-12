<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Loan;
use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Loan::with(['barang', 'peminjam'])
            ->where('user_id', Auth::id())
            ->get();

        return view('User.Peminjaman', compact('peminjaman'));
    }

    public function create()
    {
        $barangs = Barang::all();
        $peminjams = Peminjam::all();

        return view('User.PeminjamanForm', compact('barangs', 'peminjams'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'peminjam_id' => 'required|exists:peminjam,id',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
            'deskripsi' => 'nullable|string|max:1000',
        ]);

        $data['user_id'] = Auth::id();
        $data['status'] = 'pending';

        Loan::create($data);

        return redirect()->route('user.peminjaman.index')
            ->with('success', 'Pengajuan peminjaman berhasil disimpan.');
    }

    public function edit(Loan $peminjaman)
    {
        abort_if($peminjaman->user_id !== Auth::id(), 403);

        $barangs = Barang::all();
        $peminjams = Peminjam::all();

        return view('User.PeminjamanForm', compact('peminjaman', 'barangs', 'peminjams'));
    }

    public function update(Request $request, Loan $peminjaman)
    {
        abort_if($peminjaman->user_id !== Auth::id(), 403);

        $data = $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'peminjam_id' => 'required|exists:peminjam,id',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
            'deskripsi' => 'nullable|string|max:1000',
            'status' => 'required|in:pending,approved,returned,rejected',
        ]);

        $peminjaman->update($data);

        return redirect()->route('user.peminjaman.index')
            ->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    public function destroy(Loan $peminjaman)
    {
        abort_if($peminjaman->user_id !== Auth::id(), 403);

        $peminjaman->delete();

        return redirect()->route('user.peminjaman.index')
            ->with('success', 'Peminjaman berhasil dihapus.');
    }

    public function riwayat()
    {
        $riwayat = Loan::with('barang')
            ->where('user_id', Auth::id())
            ->whereIn('status', ['returned', 'rejected'])
            ->get();

        return view('User.Riwayat', compact('riwayat'));
    }
}
