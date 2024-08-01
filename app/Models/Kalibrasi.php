<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Kalibrasi extends Model
{
    use HasFactory;
    protected $table = 'kalibrasi';
    protected $fillable = [
        'unit',
        'date',
        'jenis_bahan_kimia',
        'dosis',
    ];
}
