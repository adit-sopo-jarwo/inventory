<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    use HasFactory;
    protected $table = 'keluars';
    protected $fillable = [
        'id_pesanan',
        'id_ecommerce',
        'nama_penerima',
        'alamat',
        'no_tlp',
        'nama',
        'warna',
        'size',
        'sku',
        'media',
        'total',
        'status',
        'first_success_time',   
    ];
}
