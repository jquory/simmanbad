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
        'stok_awal',
        'stok_akhir'
    ];
}
