<?php

namespace App\Livewire\Web;

use App\Models\WebEventosModel;
use Livewire\Component;
use Livewire\WithPagination;

class EventosController extends Component
{
    use WithPagination;

    public $Cantidad;
    public function mount(){
        $this->Cantidad='4';
    }
    public function render() {
        $eventos=WebEventosModel::where('wwevs_act','1')->OrderBy('wwevs_dateini')->get();
        $mes=['no','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];

        return view('livewire.web.eventos-controller',[
            'eventosProx'=>WebEventosModel::where('wwevs_act','1')->OrderBy('wwevs_dateini','asc')->where('wwevs_datefin','>=',now())->get(),
            'eventosPast'=>WebEventosModel::where('wwevs_act','1')->OrderBy('wwevs_dateini','desc')->where('wwevs_datefin','<',now())->paginate($this->Cantidad),
            'mes'=>$mes,
        ]);
    }
}
