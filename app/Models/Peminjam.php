<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $table = 'peminjam';

    protected $fillable = [
        'nama_peminjam',
        'no_identitas',
        'kontak',
        'alamat',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
