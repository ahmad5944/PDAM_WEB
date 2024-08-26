<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class BahanKimiaOp extends Model
{
    use HasFactory;
    protected $table = 'bahan_kimia_op';
    protected $fillable = [
        'jenis_bahan_kimia_id',
        'deskripsi',
        'stok_pemakaian',
        'jam',
        'photo',
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
