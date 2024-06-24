<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carlos extends Model
{
    use HasFactory;
    protected $table = 'carlos';

    protected $guarded = ['$id'];
    protected $fillable = ['stok_id', 'warna', 'M', 'L', 'XL', 'Total'];
}
