<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id',
        'barang_id',
        'peminjam_id',
        'status',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'deskripsi',
    ];

    protected $dates = [
        'tanggal_peminjaman',
        'tanggal_pengembalian',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function peminjam()
    {
        return $this->belongsTo(Peminjam::class);
    }
}
