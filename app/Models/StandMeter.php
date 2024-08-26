<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandMeter extends Model
{
    use HasFactory;

    protected $table = 'stand_meter';
    protected $fillable = [
        'unit',
        'date',
        'stand1',
        'stand2',
        'stand3',
        'zona',
    ];
}
