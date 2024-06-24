<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luis extends Model
{
    use HasFactory;

    protected $table = 'luis';
    protected $guarded = ['$id'];
    protected $fillable = ['stok_id', 'warna', 'XXXL', 'VIXL', 'Total'];
}
