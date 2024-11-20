<?php

namespace App\Livewire\Sistema;

use App\Models\EspeciesModel;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.SistemaFichasPlanta')]
class FichaClavoComponent extends Component
{
    public $clavo, $act, $NvoId;

    public function mount(string $clavo){
        $this->clavo=$clavo;
        $this->act='0';
        $this->NvoId=$clavo;
    }

    public function CambiarPagina(){
        return redirect('/elclavo/'.$this->NvoId);

    }

    public function render() {
        $datos=EspeciesModel::where('clave',$this->clavo)->first();
        #dd($datos,$datos->clave);
        if(is_null($datos)  ){
            $this->clavo='buscar';
        }else{
            $this->clavo=$datos->clave;
        }
        $numeros=EspeciesModel::get()->pluck('clave');
        #dd($numeros);

        return view('livewire.sistema.ficha-clavo-component',[
            'datos'=>$datos,
            'clavos'=>$numeros,
        ]);
    }
}
