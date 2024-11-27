<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $table = 'prestasi';


    protected $fillable = [
        'id',
        'user_id',
        'name',
        'tingkat',
        'tahun',
        'pemberi',
    ];
}
