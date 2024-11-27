<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LogAktivitas extends Model
{
    use HasFactory;

    protected $table = 'log_aktivitas';


    protected $fillable = [
        'detail_aktivitas',
    ];
}
