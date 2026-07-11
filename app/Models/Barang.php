<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = [
        'nama_barang',
        'deskripsi',
        'kategori',
        'jumlah',
        'kondisi',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
