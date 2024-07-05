<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjams extends Model
{
    use HasFactory;

    protected $fillable = ['id_anggota', 'no_transaksi'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id');
    }

    public function books()
    {
        return $this->belongsTo(Books::class, 'id_buku', 'nama_buku');
    }
}
