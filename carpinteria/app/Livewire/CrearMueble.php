<?php

namespace App\Livewire;

use App\Models\Fabricado;
use App\Models\Mueble;
use App\Models\Prefabricado;
use Livewire\Component;

class CrearMueble extends Component
{

    public $denominacion;
    public $tipo;
    public $ancho;
    public $alto;
    public $precio;

    public function mount()
    {
        $this->denominacion = '';
        $this->tipo = 'App\Models\Prefabricado';
        $this->ancho = '';
        $this->alto = '';
        $this->precio = '';
    }

    public function crearMueble()
    {
        $creado = null;
        if ($this->tipo == 'App\Models\Prefabricado') {
            $creado = Prefabricado::create();
        } elseif ($this->tipo == 'App\Models\Fabricado') {
            $creado = Fabricado::create([
                'ancho' => $this->ancho,
                'alto' => $this->alto
            ]);
        }

        Mueble::create([
            'denominacion' => $this->denominacion,
            'precio' => $this->precio,
            'fabricable_type' => $this->tipo,
            'fabricable_id' => $creado->id,
        ]);

        return redirect()->route('muebles.index');
    }

    public function render()
    {
        return view('livewire.crear-mueble');
    }
}
