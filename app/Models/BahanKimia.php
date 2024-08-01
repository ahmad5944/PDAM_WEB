<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class BahanKimia extends Model
{
    use HasFactory;
    protected $table = 'bahan_kimia';
    protected $fillable = [
        'jenis_bahan_kimia_id',
        'deskripsi',
        'vendor_id',
        'stok',
        'satuan_id',
        'address',
        'status',
    ];

    public function jenisBahanKimia()
    {
        return $this->belongsTo('App\Models\JenisBahanKimia', 'jenis_bahan_kimia_id', 'id');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor', 'vendor_id', 'id');
    }

    public function satuan()
    {
        return $this->belongsTo('App\Models\Satuan', 'satuan_id', 'id');
    }
}
