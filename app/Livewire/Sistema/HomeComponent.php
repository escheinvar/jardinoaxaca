<?php

namespace App\Livewire\Sistema;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.SistemaBase')]
class HomeComponent extends Component
{
    public function render(){
       #dd(session()->all());
        return view('livewire.sistema.home-component');
    }
}
