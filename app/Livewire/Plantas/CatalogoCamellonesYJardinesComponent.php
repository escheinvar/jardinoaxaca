<?php

namespace App\Livewire\Plantas;

use App\Models\CatCamellonesModel;
use App\Models\CatCampusModel;
use App\Models\CatJardinesModel;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('plantillas.PlantillaSistemaBase')]
class CatalogoCamellonesYJardinesComponent extends Component
{
    public $orden, $sentido, $jardin;

    public function mount(){
        $this->orden='cam_id';
        $this->sentido='asc';
        $this->jardin='1';
    }
    public function render() {

        $jardines=CatCampusModel::join('cat_jardines','ccam_cjarid','=','cjar_id')
            ->orderBy('cjar_name','asc')
            ->orderBy('ccam_name','asc')
            ->get();

        $camellones=CatCamellonesModel::select('*')
            ->where('cam_ccamid',$this->jardin)
            ->orderBy($this->orden,$this->sentido)
            ->get();

        return view('livewire.plantas.catalogo-camellones-y-jardines-component',[
            'jardines'=>$jardines,
            'camellones'=>$camellones,
        ]);
    }
}
