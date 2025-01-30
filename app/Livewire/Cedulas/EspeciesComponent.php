<?php

namespace App\Livewire\Cedulas;

use App\Models\CatKewModel;
use App\Models\SpCedulasModel;
use App\Models\SpFotosModel;
use App\Models\SpTitulosModel;
use App\Models\SpUrlModel;
use Illuminate\Support\Facades\App;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.SistemaFichasPlanta')]
class EspeciesComponent extends Component
{

    public $url, $jardin, $idioma;

    public function mount($url, $jardin){
        $this->url=$url;
        $this->jardin=$jardin;
        $this->idioma=session('localeid');
    }

    public function idiomas(){
        session(['localeid'=> $this->idioma]);
        App::setLocale($this->idioma);

        redirect('/sp/'.$this->url.'/'.$this->jardin);
    }

    public function render(){
        dd(session()->all());
        $datoUrl=SpUrlModel::where('url_act','1')->where('url_url',$this->url)->first();
        if($datoUrl =='' or is_null($datoUrl)){redirect('/errorNo URL');die();}

        ##### Obtiene datos taxonómicos principales
        if($datoUrl->url_reino =='pl'){
            $taxo['id']=$datoUrl->url_sp;
            $taxo['nombrecomun']=$datoUrl->url_nombrecomun;
            $taxo['reino']='Plantae';
            $taxo['familia']=CatKewModel::where('ckew_taxonid',$datoUrl->url_sp)->get()->value('ckew_family');
            $taxo['sp']=CatKewModel::where('ckew_taxonid',$datoUrl->url_sp)->get()->value('ckew_scientfiicname');
            $taxo['autor']=CatKewModel::where('ckew_taxonid',$datoUrl->url_sp)->get()->value('ckew_scientfiicnameautorship');
        }else{
            $taxo['id']=$datoUrl->url_sp;
            $taxo['nombrecomun']=$datoUrl->url_nombrecomun;
            $taxo['reino']='Animalia';
            $taxo['familia']='';
            $taxo['sp']='';
            $taxo['autor']='';
        }

        $texto=SpCedulasModel::where('ced_act','1')
            #->join('sp_titulos','ced_titulo','=','tit_id')
            ->where(function($q){
                return $q
                ->where('ced_lengua',$this->idioma)
                ->orWhere('ced_lengua','1');
            })
            ->where('ced_url',$datoUrl->url_id)
            ->orderBy('ced_order','asc')
            #->orderBy('ced_lengua','asc')
            ->get();

        $titulos= $texto->where('ced_titulo','1');

        $fotos=SpFotosModel::where('imgsp_act','1')
            ->where('imgsp_url',$datoUrl->url_id)
            ->get();

#dd($texto);
        return view('livewire.cedulas.especies-component',[
            'taxo'=>$taxo,
            'titulos'=>$titulos,
            'texto'=>$texto,
            'fotos'=>$fotos,
        ]);
    }
}
