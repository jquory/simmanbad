<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';


    protected $fillable = [
        'user_id',
        'id_produk',
        'tanggal_awal_sewa',
        'tanggal_akhir_sewa',
        'tanggal_pengembalian',
        'status_pembayaran',
        'tanggal_pembayaran',
        'tanggal_dikirim',
        'alamat_pengiriman',
        'status_pengiriman'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function produk()
    {
        return $this->belongsTo(IndexProduk::class, 'id_produk');
    }
}
