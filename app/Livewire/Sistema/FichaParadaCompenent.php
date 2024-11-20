<?php

namespace App\Livewire\Sistema;

use Livewire\Component;

class FichaParadaCompenent extends Component
{
    public $parada;

    public function mount(string $parada){
        $this->parada=$parada;    
    }

    public function render(){
        return view('livewire.sistema.ficha-parada-compenent');
    }
}
