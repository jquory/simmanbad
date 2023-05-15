<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';


    protected $fillable = [
        'id_barang',
        'nama_barang',
        'satuan',
        'jumlah_masuk',
        'waktu_masuk'
    ];
}
