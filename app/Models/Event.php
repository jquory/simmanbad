<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event';


    protected $fillable = [
        'id',
        'name',
        'image',
        'tanggal',
        'detil'
    ];
}
