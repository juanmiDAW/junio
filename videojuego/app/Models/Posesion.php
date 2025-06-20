<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\Type\TrueType;

class Posesion extends Model
{
    /** @use HasFactory<\Database\Factories\PosesionFactory> */
    use HasFactory;

    protected $fillable=['videojuego_id','user_id'];

    protected $table ='posesiones';

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function videojuego(){
        return $this->belongsTo(Videojuego::class);
    }
}
