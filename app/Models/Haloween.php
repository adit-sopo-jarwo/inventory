<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Haloween extends Model
{
    use HasFactory;

    protected $table = 'haloweens';
    protected $guarded = ['$id'];

    protected $fillable = ['stok_id', 'warna', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'Total'];
}
