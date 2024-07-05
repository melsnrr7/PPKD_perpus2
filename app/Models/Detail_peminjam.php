<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_peminjam extends Model
{
    use HasFactory;

    protected $fillable = ['id_peminjam', 'id_buku', 'tanggal_pinjam', 'tanggal_pengembalian', 'keterangan'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_peminjam', 'id');
    }

    public function books()
    {
        return $this->belongsTo(Books::class, 'id_buku', 'id');
    }

    // public function peminjams()
    // {
    //     return $this->belongsTo(Peminjams::class, 'id_anggota', 'id');
    // }
}
