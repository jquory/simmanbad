<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';


    protected $fillable = [
        'id',
        'id_barang',
        'nama_barang',
        'kode_barang',
        'satuan',
        'jumlah_masuk',
        'waktu_masuk'
    ];

    public function stok ()
    {
        return $this->hasOne(Stok::class,'id_barang');
    }
}
