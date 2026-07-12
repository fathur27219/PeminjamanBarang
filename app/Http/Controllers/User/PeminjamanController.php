<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Loan::all();
        return view('User.Peminjaman', compact('peminjaman'));
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
