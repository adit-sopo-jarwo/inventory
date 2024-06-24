<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Masuk extends Model
{
    use HasFactory;

    protected $table = 'masuks';

    protected $fillable = [
        'stok_id',
        'operator',
        'batch',
        'sku',
        'produk',
        'warna',
        'ukuran',
        'image',
        'tanggal_masuk',
        'pembayaran',
        'total',
    ];

    public function stok()
    {
        return $this->belongsTo(Stok::class);
    }

}
