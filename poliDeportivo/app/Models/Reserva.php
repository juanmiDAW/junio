<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    /** @use HasFactory<\Database\Factories\ReservaFactory> */
    use HasFactory;

    protected $fillable = ['dia_y_hora', 'pista_id', 'user_id'];

    public function pista(){
        return $this->belongsTo(Pista::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
