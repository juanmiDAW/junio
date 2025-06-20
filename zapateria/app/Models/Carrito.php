<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    /** @use HasFactory<\Database\Factories\CarritoFactory> */
    use HasFactory;

    protected $fillable = ['usuario_id', 'zapato_id', 'cantidad'];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function zapato(){
        return $this->belongsTo(Zapato::class);
    }


}
