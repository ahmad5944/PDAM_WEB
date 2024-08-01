<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class JenisBahanKimia extends Model
{
    use HasFactory;
    protected $table = 'jenis_bahan_kimia';
    protected $fillable = [
        'nama',
        'deskripsi',
    ];
}
