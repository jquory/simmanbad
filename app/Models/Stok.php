<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Stok extends Model
{
    use HasFactory;
    protected $table = 'stock';

    protected $fillable = [
        'id_barang',
        'stok_awal',
        'stok_akhir'
    ];

    public function barangMasuk()
    {
        return $this->belongsTo(BarangMasuk::class,'id_barang');
    }
}
