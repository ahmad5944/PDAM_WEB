<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservoar extends Model
{
    use HasFactory;

    protected $table = 'reservoar';
    protected $fillable = [
        'date',
        'unit',
        'level',
        'kubikasi',
    ];
}
