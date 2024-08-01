<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class KualitasAir extends Model
{
    use HasFactory;
    protected $table = 'kualitas_air';
    protected $fillable = [
        'unit',
        'air_baku',
        'air_bersih',
        'ph',
        'jam',
    ];
}
