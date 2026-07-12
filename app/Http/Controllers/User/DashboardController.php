<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $sedangDipinjam = Loan::where('user_id', $user->id)
            ->where('status', 'approved')
            ->count();

        $pending = Loan::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count();

        $riwayat = Loan::where('user_id', $user->id)
            ->count();

        return view('user.dashboard', compact(
            'sedangDipinjam',
            'pending',
            'riwayat'
        ));
    }
}
