<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zapato extends Model
{
    /** @use HasFactory<\Database\Factories\ZapatoFactory> */
    use HasFactory;

    protected $filalble = ['codigo', 'denomicacion', 'precio'];

    public function carritos(){
        return $this->belongsToMany(Carrito::class);
    }

    public function zapatos(){
        return $this->hasMany(Zapato::class);
    }
}
