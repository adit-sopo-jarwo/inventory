<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class New_paloma extends Model
{
    use HasFactory;

    protected $table = 'new_palomas';
    protected $guarded = ['$id'];
    protected $fillable = ['stok_id', 'warna', 'M', 'L', 'XL', 'XXL', 'XXXL', 'Total'];
}
