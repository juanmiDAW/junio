<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Volt\Actions\ReturnTitle;

class Desarrolladora extends Model
{
    /** @use HasFactory<\Database\Factories\DesarrolladoraFactory> */
    use HasFactory;

    protected $fillable =['nombre', 'distribuidora_id'];

    public function distribuidora(){
        return $this->belongsTo(Distribuidor::class);
    }

    public function videojuegos(){
        return $this->hasMany(Videojuego::class);
    }
}
