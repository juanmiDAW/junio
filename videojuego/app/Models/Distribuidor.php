<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Volt\Actions\ReturnTitle;

class Distribuidor extends Model
{
    /** @use HasFactory<\Database\Factories\DistribuidorFactory> */
    use HasFactory;

    protected $fillable =[ 'nombre'];

    protected $table = 'distribuidoras';

    public function desarrolladoras(){
        return $this->hasMany(Desarrolladora::class, 'distribuidora_id');
    }
}
