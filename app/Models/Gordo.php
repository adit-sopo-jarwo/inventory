<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gordo extends Model
{
    use HasFactory;
    protected $table = 'gordos';
    protected $guarded = ['$id'];
    protected $fillable = ['stok_id', 'warna', 'XXXL', 'VIXL', 'Total'];
}
