<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class IndexProduk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'uuid',
        'nama_produk',
        'merk',
        'model',
        'kapasitas',
        'tahun',
        'negara',
        'gambar',
        'harga'
    ];

    public function produkKeluar()
    {
        return $this->hasMany(ProdukKeluar::class);
    }

    // Relasi dengan BarangMasuk
    public function produkMasuk()
    {
        return $this->hasMany(ProdukMasuk::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
