<?php

namespace App\Livewire;

use App\Models\Desarrolladora;
use App\Models\Distribuidor;
use Livewire\Component;
use Livewire\Volt\Compilers\Mount;

class Update extends Component
{

    public $distribuidoras = '';
    public $distribuidora_id = '';
    public $desarrolladoras = '';

    public function mount(){
        $this->distribuidoras=Distribuidor::with('desarrolladoras')->get();
        $this->distribuidora_id = 1;
    }

    public function updateDistribuidora_id(){
        $this->desarrolladoras = Desarrolladora::where('distribuidora_id', $this->distribuidora_id)->get();
    }

    public function render()
    {
        return view('livewire.update');
    }
}
