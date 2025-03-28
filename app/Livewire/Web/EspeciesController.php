<?php

namespace App\Livewire\Web;

use App\Models\EspeciesModel;
use App\Models\SpUrlCedulaModel;
use App\Models\SpUrlModel;
use Livewire\Component;

class EspeciesController extends Component
{
    public function render(){
        $cedulas=SpUrlModel::where('url_act','1')->orderBy('url_nombre','asc')->get();



        return view('livewire.web.especies-controller',[
            'cedulas'=>$cedulas,
        ]);
    }
}
