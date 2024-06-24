<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classico extends Model
{
    use HasFactory;
    protected $table = 'classicos';
    protected $guarded = ['$id'];
    protected $fillable = ['stok_id', 'warna', 'M', 'L', 'XL', 'Total'];
}
