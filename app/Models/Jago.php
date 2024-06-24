<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jago extends Model
{
    use HasFactory;
    protected $table = 'jagos';
    protected $guarded = ['$id'];

    protected $fillable = ['stok_id', 'warna', 'S', 'Total'];
}
