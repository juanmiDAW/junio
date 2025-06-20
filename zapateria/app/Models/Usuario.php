<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Usuario extends Model
{
    /** @use HasFactory<\Database\Factories\UsuarioFactory> */
    use HasFactory;

    protected $fillable = ['nombre', 'password'];

    public function carrtitos(){
        return $this->hasMany(Carrito::class);
    }

    public function facturas(){
        return $this->hasMany(Factura::class);
    }

    
}
