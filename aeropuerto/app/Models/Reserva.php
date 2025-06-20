<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    /** @use HasFactory<\Database\Factories\ReservaFactory> */
    use HasFactory;

    protected $fillable = [
        'fecha_compra',
        'vuelos_id',
        'user_id',
        'asiento'
    ];

    public function vuelo(){
        return $this->belongsTo(Vuelo::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
