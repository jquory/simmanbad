<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';


    protected $fillable = [
        'id_barang',
        'nama_barang',
        'satuan',
        'jumlah_keluar',
        'waktu_keluar'
    ];
}
