<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Prefabricado extends Model
{
    /** @use HasFactory<\Database\Factories\PrefabricadoFactory> */
    use HasFactory;

    public function muebles(){
        return $this->morphMany(Prefabricado::class, 'fabricable');
    }
}
