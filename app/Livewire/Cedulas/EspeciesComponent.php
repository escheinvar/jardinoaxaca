<?php

namespace App\Livewire\Cedulas;

use App\Models\CatCampusModel;
use App\Models\CatKewModel;
use App\Models\SpCedulasModel;
use App\Models\SpFotosModel;
use App\Models\SpTitulosModel;
use App\Models\SpUrlModel;
use Illuminate\Support\Facades\App;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('plantillas.PlantillaWebSinScroll')]
class EspeciesComponent extends Component
{

    public $url, $jardin, $idioma;

    public function mount($url, $jardin){
        if(session('localeid')==''){
            session(['localeid'=>'spa']);
        }
        $this->url=$url;
        $this->jardin=$jardin;
        $this->idioma=session('localeid');
    }

    public function idiomas(){
        session(['locale'=> $this->idioma]);
        session(['localeid'=> $this->idioma]);
        App::setLocale($this->idioma);

        redirect('/sp/'.$this->url.'/'.$this->jardin);
    }

    public function render(){
        $datoUrl=SpUrlModel::where('url_act','1')->where('url_url',$this->url)->first();
        if($datoUrl =='' or is_null($datoUrl)){redirect('/errorNo URL');die();}

        ##### Obtiene datos taxonómicos principales de la especie
        if($datoUrl->url_reino =='pl'){
            $taxo['id']=$datoUrl->url_sp;
            $taxo['nombrecomun']=$datoUrl->url_nombrecomun;
            $taxo['reino']='Plantae';
            $taxo['familia']=CatKewModel::where('ckew_taxonid',$datoUrl->url_sp)->get()->value('ckew_family');
            $taxo['sp']=CatKewModel::where('ckew_taxonid',$datoUrl->url_sp)->get()->value('ckew_scientfiicname');
            $taxo['autor']=CatKewModel::where('ckew_taxonid',$datoUrl->url_sp)->get()->value('ckew_scientfiicnameautorship');
        }else{  #### en tanto no exista catálogo de plantas u hongos....
            $taxo['id']=$datoUrl->url_sp;
            $taxo['nombrecomun']=$datoUrl->url_nombrecomun;
            $taxo['reino']='Animalia';
            $taxo['familia']='';
            $taxo['sp']='';
            $taxo['autor']='';
        }

        ###### Obtiene todo el texto de la especie, en el idioma y para el jardín seleccionado
        $texto=SpCedulasModel::where('ced_act','1')
            ->where(function($q){
                return $q
                ->where('ced_clencode',$this->idioma)  ##### idioma seleccionado
                ->orWhere('ced_clencode','none');      ##### o sin idioma determinado
            })
            ->where('ced_jardin',$this->jardin)      #### perteneciente al jardín sensu URL
            ->where('ced_url',$datoUrl->url_id)      #### de la especie sensu URL
            ->orderBy('ced_order','asc')             #### párrafos ordenados por campo order
            ->get();
        ###### De la selección de textos, extrae los títulos (para construir menú)
        $titulos= $texto->where('ced_titulo','1');

        ##### obtiene las fotos de la cédula
        $fotos=SpFotosModel::where('imgsp_act','1')
            ->where('imgsp_url',$datoUrl->url_id)
            ->get();

        ##### obtiene listado simple de lenguas para las que existe la cédula
        $lenguas=SpCedulasModel::where('ced_act','1')
            ->whereNot('ced_clencode','none')
            ->where('ced_url',$datoUrl->url_id)
            ->where('ced_jardin',$this->jardin)
            ->distinct('ced_clencode')
            ->join('cat_lenguas','ced_clencode','=','clen_code')
            ->select('clen_code','clen_lengua','clen_autonimias')
            ->get();

        ##### Obtiene datos del jardín
        $jardinData=CatCampusModel::where('ccam_id',$this->jardin)
            ->where('ccam_act','1')
            ->join('cat_jardines','ccam_cjarid','=','cjar_id')
            ->first();
        ##### Obtiene datos de los clavos del jardín
        $clavos=['695', '698', '966', '2525'];
        $herbario=[ '1050', '1099', '1085', '1045', '1398', '1765'];
        $otrosJardines=['Jardín Comunitario de Matatlán','Parque Primavera'];

        ###### Redirecciona en caso de no existir ficha o url válida
        #dd($texto);
        if(is_null($texto) OR $texto->count() < 1 OR is_null($jardinData) ){
            redirect('/error No URL');
            dd('No existe la URL');
            die();
        }
        return view('livewire.cedulas.especies-component',[
            'taxo'=>$taxo,
            'titulos'=>$titulos,
            'texto'=>$texto,
            'fotos'=>$fotos,
            'lenguas'=>$lenguas,
            'jardinData'=>$jardinData,
            'clavos'=>$clavos,
            'herbario'=>$herbario,
            'otrosJardines'=>$otrosJardines,
        ]);
    }
}
