<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class IndexBarang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'uuid',
        'kode_barang',
        'nama_barang',
        'spek',
        'satuan',
    ];
}
