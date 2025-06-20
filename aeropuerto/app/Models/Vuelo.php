<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    /** @use HasFactory<\Database\Factories\VueloFactory> */
    use HasFactory;
    
    protected $fillable = [
        'codigo',
        'origen',
        'destino',
        'companya',
        'salida',
        'llegada',
        'plazas',
        'precio'
    ];
    
    public function reservas(){
        return $this->hasMany(Reserva::class);
    }
    
    public function aeropuertoOrigen(){
        return $this->belongsTo(Aeropuerto::class, 'origen');
    }

    public function aeropuertoDestino(){
        return $this->belongsTo(Aeropuerto::class, 'destino');
    }
}