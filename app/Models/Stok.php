<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'warna', 'size', 'total'];

    public function adalfos()
    {
        return $this->hasOne(Adalfo::class);
    }

    public function alverios()
    {
        return $this->hasOne(Alverio::class);
    }

    public function antonios()
    {
        return $this->hasOne(Antonio::class);
    }

    public function carloses()
    {
        return $this->hasOne(Carlos::class);
    }

    public function casimiros()
    {
        return $this->hasOne(Casimiro::class);
    }

    public function classicos()
    {
        return $this->hasOne(Classico::class);
    }
    
    public function dyazs()
    {
        return $this->hasOne(Dyaz::class);
    }
    public function erasmos()
    {
        return $this->hasOne(Erasmo::class);
    }

    public function gavis()
    {
        return $this->hasOne(Gavi::class);
    }

    public function gordos()
    {
        return $this->hasOne(Gordo::class);
    }

    public function hilarios()
    {
        return $this->hasOne(Hilario::class);
    }

    public function limitados()
    {
        return $this->hasOne(Limitado::class);
    }

    public function luises()
    {
        return $this->hasOne(Luis::class);
    }
    
    public function new_carloses()
    {
        return $this->hasOne(New_carlos::class);
    }

    public function new_palomas()
    {
        return $this->hasOne(New_paloma::class);
    }

    public function palomas()
    {
        return $this->hasOne(Paloma::class);
    }

    public function campers()
    {
        return $this->hasOne(Camper::class);
    }

    public function gream_reapes()
    {
        return $this->hasOne(Gream_reaper::class);
    }

    public function greatmoths()
    {
        return $this->hasOne(Greatmoth::class);
    }

    public function haloweens()
    {
        return $this->hasOne(Haloween::class);
    }

    public function mountcations()
    {
        return $this->hasOne(Mountcation::class);
    }

    public function originals()
    {
        return $this->hasOne(Original::class);
    }

    public function perfects()
    {
        return $this->hasOne(Perfect::class);
    }

    public function relaxes()
    {
        return $this->hasOne(Relax::class);
    }

    public function samurais()
    {
        return $this->hasOne(Samurai::class);
    }

    public function vitamins()
    {
        return $this->hasOne(Vitamin::class);
    }

    public function chicos()
    {
        return $this->hasOne(Chico::class);
    }

    public function byus()
    {
        return $this->hasOne(Byu::class);
    }

    public function jagos()
    {
        return $this->hasOne(Jago::class);
    }

    public function macario()
    {
        return $this->hasOne(Macario::class);
    }

    public function pirros()
    {
        return $this->hasOne(Pirro::class);
    }

    public function keluars()
    {
        return $this->hasOne(Keluar::class);
    }

    public function masuks()
    {
        return $this->hasMany(Masuk::class);
    }

    public function bermudas()
    {
        return $this->hasOne(Bermudas::class);
    }

    
}
