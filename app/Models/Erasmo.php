<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Erasmo extends Model
{
    use HasFactory;
    protected $table = 'erasmos';
    protected $guarded = ['$id'];
    protected $fillable = ['stok_id', 'warna', 'M', 'L', 'XL', 'XXL', 'XXXL', 'Total'];
}
