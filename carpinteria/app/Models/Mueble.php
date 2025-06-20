<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\VarDumper\Exception\ThrowingCasterException;

class Mueble extends Model
{
    /** @use HasFactory<\Database\Factories\MuebleFactory> */
    use HasFactory;

    protected $fillable = ['denominacion', 'precio', 'fabricable_type', 'fabricable_id'];

    public function fabricable(){
        return $this->morphTo();
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
