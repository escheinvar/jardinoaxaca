<?php

namespace App\Livewire\Cedulas;

use App\Models\CatJardinesModel;
use App\Models\CatKewModel;
use App\Models\CatLenguasModel;
use App\Models\FotosPlantasModel;
use App\Models\SpCedulasModel;
use App\Models\SpFotosModel;
use App\Models\SpUrlCedulaModel;
use App\Models\SpUrlModel;
use App\Models\UserRolesModel;
use Database\Seeders\SpCedulaSeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CatalogoDeCedulasComponent extends Component
{
    #[Layout('components.layouts.SistemaBase')]

    public $NvoTema, $NvoJardin,$NvoLengua, $NvoCopia, $NvoCopia2, $Valida;
    public $VerCrearCedula, $VerNuevoTema;
    public $urlUrl, $urlNombre, $urlReino, $urlSp, $urlNombrecomun, $urlSciname, $urlpalabras;
    public $urlGenero, $urlGeneros;

    public function mount(){
        $this->NvoCopia='0';
        $this->VerCrearCedula='0';
        $this->VerNuevoTema='0';
        $this->urlGeneros=collect();
    }

    public function GeneraCedula(){
        ##### Valida campos
        $this->validate([
            'NvoTema'=>'required',
            'NvoJardin'=>'required',
            'NvoLengua'=>'required',
        ]);
        if($this->NvoCopia=='1'){
            $this->validate([
                'NvoCopia2'=>'required',
            ]);
        }
        ###### Valida  que no exista la cédula
        $ganon=SpUrlCedulaModel::where('ced_act','1')
            ->where('ced_urlurl',$this->NvoTema)
            ->where('ced_clencode',$this->NvoLengua)
            ->where('ced_cjarsiglas',$this->NvoJardin)
            ->count();
        if($ganon>0){
            $this->validate([
                'Valida'=>'required',
            ],['Valida.required'=>'Error. Esta cédula ya existe.']);
        }

        ##### Genera nueva cédula en BD
        $NuevaCedula=SpUrlCedulaModel::create([
            'ced_id'=>SpUrlCedulaModel::max('ced_id') + 1,
            'ced_act'=>'1',
            'ced_edo'=>'0',
            'ced_urlurl'=>$this->NvoTema,
            'ced_clencode'=>$this->NvoLengua,
            'ced_cjarsiglas'=>$this->NvoJardin,
            'ced_version'=>'1.0',
            'ced_versiondate'=>date('Y-m-d'),
        ]);

        ##### genera cédula nueva (en caso de)
        if($this->NvoCopia=='0'){
            SpCedulasModel::create([
                'txt_id'=>SpCedulasModel::max('txt_id') + 1,
                'txt_cedid'=>$NuevaCedula->ced_id,
                'txt_titulo'=>'1',
                'txt_order'=>'1',
                'txt_codigo'=>'Titulo',
            ]);
        ##### Copia cédula (en caso de)
        } elseif ($this->NvoCopia=='1'){
            ##### copia texto
            $origen=SpCedulasModel::where('txt_cedid',$this->NvoCopia2)  #NvoCopia2=ced_id
                ->where('txt_act','1')
                ->get();

            ##### pega texto
            foreach($origen as $o){
                ##### copia BD
                $nvo=SpCedulasModel::create([
                    'txt_cedid'=>$NuevaCedula->ced_id,
                    'txt_titulo'=>$o->txt_titulo,
                    'txt_order'=>$o->txt_order,
                    'txt_codigo'=>$o->txt_codigo,
                    'txt_audio'=>$o->txt_audio,
                    'txt_autor'=>$o->txt_autor,
                    'txt_version'=>$o->txt_version,
                ]);
                ##### copia audios
                if($o->txt_audio != '' ){
                    $datos=SpUrlCedulaModel::where('ced_id',$o->txt_cedid)->first();
                    $NvoNombre=$datos->ced_urlurl."_".$this->NvoJardin."_".$this->NvoLengua."_".$nvo->txt_id.".".preg_replace('/^.*\./','',$o->txt_audio);
                    Storage::copy('/aPublic/cedulas/audios/'.$o->txt_audio,  '/aPublic/cedulas/audios/'.$NvoNombre);
                    SpCedulasModel::where('txt_id',$nvo->txt_id)->update([
                        'txt_audio'=>$NvoNombre,
                    ]);
                }
            }

            ##### Revisa si hay imágenes para esa url-jardin
            $origen2=SpFotosModel::where('imgsp_act','1')
                ->where('imgsp_urlurl',$this->NvoTema)
                ->where('imgsp_cjarsiglas',$this->NvoJardin)
                ->get();

            ##### Si no hay imágenes para la url-jardin, las copia
            if($origen2->count() =='0'){
                ##### Obtiene el listado de imágenes
                $idOrigen=SpUrlCedulaModel::where('ced_act','1')->where('ced_id',$this->NvoCopia2)->first();
                $origen3=SpFotosModel::where('imgsp_act','1')
                    ->where('imgsp_urlurl',$idOrigen->ced_urlurl)
                    ->where('imgsp_cjarsiglas',$idOrigen->ced_cjarsiglas)
                    ->get();
                ##### Copia las imágenes

                foreach($origen3 as $o){
                    ##### Si hay imagen, copia el archivo
                    if($o->imgsp_file != ''){
                        $NvoNombre=$this->NvoTema."_".$this->NvoJardin."_".$o->imgsp_cimgname.".".preg_replace('/^.*\./','',$o->imgsp_file);
                        Storage::copy('/aPublic/cedulas/'.$o->imgsp_file,  '/aPublic/cedulas/'.$NvoNombre);
                    }else{$NvoNombre=null;}

                    ##### Si hay imagen de baja resolución, copia el archivo
                    if($o->imgsp_filelow != ''){
                        $NvoNombreLow=$this->NvoTema."_".$this->NvoJardin."_".$o->imgsp_cimgname."_low.".preg_replace('/^.*\./','',$o->imgsp_filelow);
                        Storage::copy('/aPublic/cedulas/'.$o->imgsp_filelow,  '/aPublic/cedulas/'.$NvoNombreLow);
                    }else{$NvoNombreLow=null;}

                    ##### Copia las nuevas imágenes en BD
                    SpFotosModel::create([
                        'imgsp_urlurl'=>$this->NvoTema,
                        'imgsp_cjarsiglas'=>$this->NvoJardin,
                        'imgsp_file'=>$NvoNombre,
                        'imgsp_filelow'=>$NvoNombreLow,
                        'imgsp_cimgname'=>$o->imgsp_cimgname,
                        'imgsp_autor'=>$o->imgsp_autor,
                        'imgsp_titulo'=>$o->imgsp_titulo,
                        'imgsp_pie'=>$o->imgsp_pie,
                        'imgsp_date'=>$o->imgsp_date,
                        'imgsp_descrip'=>$o->imgsp_descrip,
                        'imgsp_metadata'=>$o->imgsp_metadata,
                    ]);
                }
            }
            $this->VerCrearCedula='0';
        }
        #######

    }

    public function IrConLengua($lengua,$url,$jardin){
        session(['locale2'=>$lengua]);
        redirect('/sp/'.$url.'/'.$jardin);
    }

    public function VerCrearNuevaCedula(){
        $this->VerCrearCedula='1';
    }

    public function CancelarNuevaCedula(){
        $this->VerCrearCedula='0';
    }

    public function ActivarNuevoTema(){
        $this->VerNuevoTema='1';
        $this->VerCrearCedula='0';

        $this->urlUrl='';
        $this->urlNombre='';
        $this->urlReino='';
        $this->urlSp=null;
        $this->urlNombrecomun='';
        $this->urlpalabras='';
        $this->urlSciname=null;
        $this->urlGenero=null;
    }

    public function CancelarNuevoTema(){
        $this->VerNuevoTema='0';
        $this->VerCrearCedula='0';
    }

    public function BuscaSpPlanta(){
        $this->urlGeneros=CatKewModel::where('ckew_genus','ilike','%'.$this->urlGenero.'%')
            ->select('ckew_taxonid','ckew_scientfiicname')
            ->orderBy('ckew_scientfiicname','asc')
            ->get();
    }

    public function GuardarNuevoTema(){
        $this->validate([
            'urlNombre'=>'required',
            'urlUrl'=>'required|unique:sp_url,url_url',
            'urlReino'=>'required',
        ]);
        if($this->urlReino=='pl'){
            $NomSci=CatKewModel::where('ckew_taxonid',$this->urlSp)->value('ckew_scientfiicname');
        }else{
            $NomSci=$this->urlSciname;
        }
        SpUrlModel::create([
            'url_url'=>$this->urlUrl,
            'url_nombre'=>$this->urlNombre,
            'url_reino'=>$this->urlReino,
            'url_sp'=>$this->urlSp,
            'url_nombrecomun'=>$this->urlNombrecomun,
            'url_sciname'=>$NomSci,
            'url_palabras'=>$this->urlpalabras,
        ]);
        $this->VerNuevoTema='0';
        $this->VerCrearCedula='0';
    }

    public function render(){
        ####### Obtiene listado de Jardines al que tiene acceso el admon,. de cedulas
        $Autorizados=UserRolesModel::where('rol_act','1')
            ->where('rol_crolrol','cedulas')
            ->where('rol_usrid',Auth::user()->id)
            ->pluck('rol_tipo1')
            ->toArray();
        if(in_array('todas',$Autorizados)){
            $Autorizados=CatJardinesModel::pluck('cjar_siglas')->toArray();
        }

        ##### Obtiene catálogo de temas y de jardines
        $temas=SpUrlModel::all();
        $jardines=CatJardinesModel::all();

        ##### Obtiene catálogo de lenguas
        $lenguas=CatLenguasModel::select('clen_code','clen_lengua')
            ->orderBy('clen_lengua')
            ->get();

        ##### Obtiene listado de cédulas a las que tiene acceso el admon de cédulas
        $cedulas=SpUrlCedulaModel::where('ced_act','1')
            ->join('cat_jardines','ced_cjarsiglas','=','cjar_siglas')
            ->whereIn('ced_cjarsiglas',$Autorizados)
            ->orderBy('ced_urlurl','asc')
            ->orderBy('ced_cjarsiglas','asc')
            ->get();

        ##### Preescribe ejemplo de url
        if($this->urlUrl != ''){
            $ja=strtolower($this->urlUrl);
            $sacar=[ 'ñ', ' ',  'Ñ', '=',  '\'', '\\','á', 'é','í','ó','ú','Á','É','Í','Ó','Ú','$','&','%'];
            $ja=str_replace($sacar,'',$ja);
            $this->urlUrl=$ja;
        }

        return view('livewire.cedulas.catalogo-de-cedulas-component',[
            'temas'=>$temas,
            'cedulas'=>$cedulas,
            'autorizados'=>$Autorizados,
            'jardines'=>$jardines,
            'lenguas'=>$lenguas,
        ]);
    }
}
