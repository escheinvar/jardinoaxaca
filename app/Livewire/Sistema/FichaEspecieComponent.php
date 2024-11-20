<?php

namespace App\Livewire\Sistema;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.SistemaFichasPlanta')]
class FichaEspecieComponent extends Component
{
    public function render()
    {
        return view('livewire.sistema.ficha-especie-component');
    }
}
