<?php

namespace App\Livewire;

use App\Models\Cambio;
use Livewire\Component;

class Eliminar extends Component
{

    public $ordenador_id;

    public function eliminar(){
        $cambios = Cambio::where('ordenador_id', $this->ordenador_id)->get();

        foreach($cambios as $cambio){
            $cambio->delete();
        }

       return redirect()->route('ordenadores.show', $this->ordenador_id);

    }
    public function render()
    {
        return view('livewire.eliminar');
    }
}
