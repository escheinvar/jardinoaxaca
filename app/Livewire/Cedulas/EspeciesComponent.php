<?php

namespace App\Livewire\Cedulas;

use App\Models\CatCampusModel;
use App\Models\CatKewModel;
use App\Models\SpCedulasModel;
use App\Models\SpFotosModel;
use App\Models\SpTitulosModel;
use App\Models\SpUrlCedulaModel;
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
        ##### Confirma url, lengua y jardín
        $datoUrl=SpUrlCedulaModel::join('sp_url','url_url','=','ced_urlurl')
            ->where('ced_act','1')
            ->where('ced_urlurl',$this->url)
            ->where('ced_clencode',session('localeid'))
            ->where('ced_cjarsiglas',$this->jardin)
            ->first();
        if($datoUrl =='' or is_null($datoUrl)){redirect('/errorNo URL');die();}

        ##### Obtiene datos taxonómicos principales de la especie
        if($datoUrl->url_reino =='pl'){
            $taxo['id']=$datoUrl->url_sp;
            $taxo['nombrecomun']=$datoUrl->url_nombrecomun;
            $taxo['reino']='Plantae';
            $taxo['familia']=CatKewModel::where('ckew_taxonid',$datoUrl->url_sp)->get()->value('ckew_family');
            $taxo['sp']=CatKewModel::where('ckew_taxonid',$datoUrl->url_sp)->get()->value('ckew_scientfiicname');
            $taxo['autor']=CatKewModel::where('ckew_taxonid',$datoUrl->url_sp)->get()->value('ckew_scientfiicnameautorship');
        }elseif($datoUrl->url_reino =='an'){  #### en tanto no exista catálogo de plantas u hongos....
            $taxo['id']=$datoUrl->url_sp;
            $taxo['nombrecomun']=$datoUrl->url_nombrecomun;
            $taxo['reino']='Animalia';
            $taxo['familia']='';
            $taxo['sp']='';
            $taxo['autor']='';
        }

        ###### Obtiene todo el texto de la especie, en el idioma y para el jardín seleccionado
        $texto=SpCedulasModel::where('txt_act','1')
            ->where('txt_cedid',$datoUrl->ced_id)
            ->orderBy('txt_order','asc')             #### párrafos ordenados por campo order
            ->get();
        ###### De la selección de textos, extrae los títulos (para construir menú)
        $titulos= $texto->where('txt_titulo','1');


        ##### obtiene las fotos de la cédula
        $fotos=SpFotosModel::where('imgsp_act','1')
            ->where('imgsp_urlurl',$datoUrl->ced_urlurl)
            ->get();

        $lenguas = SpUrlCedulaModel::join('cat_lenguas','clen_code','=','ced_clencode')
            ->where('ced_act','1')
            ->where('ced_urlurl',$this->url)
            ->where('ced_cjarsiglas',$this->jardin)
            ->get();

        ##### Obtiene datos del jardín
        $jardinData=CatCampusModel::join('cat_jardines','ccam_cjarid','=','cjar_id')
            ->where('ccam_act','1')
            ->where('cjar_siglas',$this->jardin)
            ->get();

        ##### Obtiene datos de los clavos del jardín
        $clavos=['695', '698', '966', '2525'];
        $herbario=[ '1050', '1099', '1085', '1045', '1398', '1765'];
        $otrosJardines=['Jardín Comunitario de Matatlán','Parque Primavera'];

        ###### Redirecciona enficha caso de no existir  o url válida
        #dd($texto);
        if(is_null($texto) OR $texto->count() < 1 OR is_null($jardinData) ){
            redirect('/error No URL');
            dd('No existe la URL');
            die();
        }
#dd($taxo);
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
