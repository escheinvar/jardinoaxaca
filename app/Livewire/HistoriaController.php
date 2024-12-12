<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;

class HistoriaController extends Component
{
    public $idioma, $lenguas=['pt','en'];

    public function mount(){
        $this->idioma= session('locale');
    }

    public function idiomas(){
        session(['locale'=> $this->idioma]);
        App::setLocale($this->idioma);
    
        redirect('/mapa');
    }

    public function render() {
        return view('livewire.historia-controller');
    }
}
