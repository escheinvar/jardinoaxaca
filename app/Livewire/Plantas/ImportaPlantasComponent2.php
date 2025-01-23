<?php

namespace App\Livewire\Plantas;

use App\Models\CatCamellonesModel;
use App\Models\CatEtiquetasImgModel;
use App\Models\CatIconosModel;
use App\Models\CatKewModel;
use App\Models\CatLenguasModel;
use App\Models\ComNamesModel;
use App\Models\FotosPlantasModel;
use App\Models\ImportaPlantasModel;
use App\Models\JardinSigModel;
use App\Models\PlantasModel;
use App\Models\SciNamesModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;



#[Layout('plantillas.PlantillaSistemaBase')]
class ImportaPlantasComponent2 extends Component
{
    Use WithFileUploads;

    public $impid;
    public $NvoCamellon, $NvoLabel, $NvoComname, $NvoSciname, $Genero, $Especie, $NvoX, $NvoY;
    public $NvoIcono,$SubeFotoLugar,$SubeFotoPlanta, $Nvofoto1, $Nvofoto2, $Nvofoto3, $Nvofoto4, $Nvofoto5, $Nvofotolugar, $flag1, $flag2, $flag3, $flag4, $flag5;
    public $Nvofotolabellugar, $Nvofotolabel1, $Nvofotolabel2, $Nvofotolabel3, $Nvofotolabel4, $Nvofotolabel5;
    public $NvoObsejemplar, $NvoObsubica, $NvoObscaptura;
    public $especies,$nespecies, $NvoLengua;
    public $NextID, $PrevID,$BotonMoverPlanta;
    public $FotoLabelCambiante, $NuevoLabel;

    public function mount($claveID){
        ##### Valida que claveID sea numérica
        if( !is_numeric($claveID) ){
            return redirect('/errorIngresaste mal la URL');
        }
        ##### Guarda valor de clave ID y carga datos
        $this->impid=$claveID;
        $Datos=ImportaPlantasModel::where('imp_id',$claveID)
            ->where('imp_act','1')
            ->first();
        ##### Valida que existan los datos
        if( is_null($Datos) ){
            return redirect('/errorNo existe el registro');
        }
        ##### Carga datos
        $this->NvoCamellon =$Datos->imp_camellon;
        $this->NvoLabel = $Datos->imp_label;
        $this->NvoComname = $Datos->imp_comname;
        $this->NvoLengua = '1';
        $this->NvoSciname = $Datos->imp_sciname;
        $this->especies=collect();
        $this->NvoX = $Datos->imp_x;
        $this->NvoY = $Datos->imp_y;
        $this->Nvofotolugar = $Datos->imp_fotolugar;
        $this->Nvofoto1 = $Datos->imp_foto1;
        $this->Nvofoto2 = $Datos->imp_foto2;
        $this->Nvofoto3 = $Datos->imp_foto3;
        $this->Nvofoto4 = $Datos->imp_foto4;
        $this->Nvofoto5 = $Datos->imp_foto5;
        $this->Nvofotolabellugar = $Datos->imp_fotolabellugar;
        $this->Nvofotolabel1 = $Datos->imp_fotolabel1;
        $this->Nvofotolabel2 = $Datos->imp_fotolabel2;
        $this->Nvofotolabel3 = $Datos->imp_fotolabel3;
        $this->Nvofotolabel4 = $Datos->imp_fotolabel4;
        $this->Nvofotolabel5 = $Datos->imp_fotolabel5;

        $this->flag1 = $Datos->imp_flag1;
        $this->flag2 = $Datos->imp_flag2;
        $this->flag3 = $Datos->imp_flag3;
        $this->flag4 = $Datos->imp_flag4;
        $this->flag5 = $Datos->imp_flag5;
        $this->NvoObsejemplar= $Datos->imp_obsejemplar;
        $this->NvoObsubica= $Datos->imp_obsubica;
        $this->NvoObscaptura= $Datos->imp_obscaptura;
        $this->Especie= $Datos->imp_kew;
        if($this->Especie > 0){
            $this->especies=CatKewModel::where('ckew_taxonid',$Datos->imp_kew)->get();
            $this->nespecies=$this->especies->count();
            #$this->Genero = CatKewModel::where('ckew_taxonid',$Datos->imp_kew)->first('ckew_scientfiicname')->pluck('ckew_scientfiicname');
            $this->Genero='--kew--';
        }
        $this->NvoIcono=$Datos->imp_iconid;
        if($this->NvoIcono == ''){$this->NvoIcono='1';}


        ##### Calcula el ID previo y el siguiente (mediante array de imp_id)
        $Lista_Ids=ImportaPlantasModel::where('imp_act','1')->pluck('imp_id')->toArray();

        ##### Obtiene el num de key del Id activo
        $key=array_keys($Lista_Ids, $this->impid)[0]; #### número de key al que corresponde el ID activo
        #dd($Lista_Ids,$key);
        if($key > 1){$this->PrevID=$Lista_Ids[$key-1];}else{$this->PrevID='1';}
        if($key <  (count($Lista_Ids)-1) ) {$this->NextID=$Lista_Ids[$key+1];}else{$this->NextID= $Lista_Ids[(count($Lista_Ids)-1)];}
        $this->BotonMoverPlanta='secondary';
    }

    public function ActivaMuevePlanta(){
        $this->BotonMoverPlanta='danger';
        $this->dispatch('CapturaCoordenadas');
    }

    public function BuscaEspecies(){
        $cuentaPalabras=str_word_count($this->Genero);
        if($cuentaPalabras =='1'){
            $this->especies=CatKewModel::where('ckew_genus','ilike','%'.$this->Genero.'%')->orderBy('ckew_scientfiicname')->get();
            $this->nespecies=CatKewModel::where('ckew_genus','ilike','%'.$this->Genero.'%')->count();
        }elseif($cuentaPalabras =='2'){
            $ja=explode(" ",$this->Genero);
            #dd($this->Genero, str_word_count($this->Genero),$ja[0],$ja[1]);
            $this->especies=CatKewModel::where('ckew_genus','ilike','%'.$ja[0].'%')
                ->where('ckew_specificepithet','ilike','%'.$ja[1].'%')
                ->orderBy('ckew_scientfiicname')->get();
            $this->nespecies=CatKewModel::where('ckew_genus','ilike','%'.$ja[0].'%')
                ->where('ckew_specificepithet','ilike','%'.$ja[1].'%')
                ->orderBy('ckew_scientfiicname')->count();
        }
    }

    public function cargaFotoLugar(){
        ##### Valida
        $this->validate([
            'SubeFotoLugar'=>'required|image',
        ]);
        ##### Genera el nombre
        $nombre=$this->impid.'_'.date('ymd_his').'.'.$this->SubeFotoLugar->getClientOriginalExtension();
        ##### Sube el archivo
        $this->SubeFotoLugar->storeAs(path:'/aPublic/cargaMasiva/',name:$nombre);

        ##### Incorpora a base de datos
        ImportaPlantasModel::where('imp_id',$this->impid)->update(['imp_fotolugar'=>$nombre]);

        redirect('/importaPlantas_ver/'.$this->impid);
    }

    public function cargaFotoPlanta(){
        ##### Valida
        // $this->validate([
        //     'SubeFotoPlanta'=>'required',
        // ]);
        #dd($this->SubeFotoPlanta);
        ##### Genera el nombre
        $nombre=$this->impid.'_'.date('ymd_his').'.'.$this->SubeFotoPlanta->getClientOriginalExtension();
        ##### Sube el archivo
        $this->SubeFotoPlanta->storeAs(path:'/aPublic/cargaMasiva/',name:$nombre);
        ##### Incorpora a base de datos
        if($this->Nvofoto1 == '' ){
            ImportaPlantasModel::where('imp_id',$this->impid)->update(['imp_foto1'=>$nombre]);
        }elseif($this->Nvofoto2 == '' ){
            ImportaPlantasModel::where('imp_id',$this->impid)->update(['imp_foto2'=>$nombre]);
        }elseif($this->Nvofoto3 == '' ){
            ImportaPlantasModel::where('imp_id',$this->impid)->update(['imp_foto3'=>$nombre]);
        }elseif($this->Nvofoto4 == '' ){
            ImportaPlantasModel::where('imp_id',$this->impid)->update(['imp_foto4'=>$nombre]);
        }elseif($this->Nvofoto5 == '' ){
            ImportaPlantasModel::where('imp_id',$this->impid)->update(['imp_foto5'=>$nombre]);
        }
        redirect('/importaPlantas_ver/'.$this->impid);
    }

    public function BorrarFoto($foto){
        ###### Obtiene nombre de foto
        $arch=ImportaPlantasModel::where('imp_id',$this->impid)->pluck('imp_foto'.$foto);
        ##### La borra en la carpeta
        Storage::delete("/aPublic/cargaMasiva/".$arch[0]);
        ##### La borra de base de datos
        ImportaPlantasModel::where('imp_id',$this->impid)->update([
            'imp_foto'.$foto=>NULL,
            'imp_fotolabel'.$foto=>NULL,
        ]);
        redirect('/importaPlantas_ver/'.$this->impid);
    }

    public function BorrarLabel($cual){
        ImportaPlantasModel::where('imp_id',$this->impid)->update([
            'imp_fotolabel'.$cual=>NULL,
        ]);
        redirect('/importaPlantas_ver/'.$this->impid);
    }

    public function AbreModalNuevoLabel($cual){
        $this->FotoLabelCambiante = $cual;
        $this->NuevoLabel='Planta';
        $this->dispatch('AbreModalLabelFoto');
    }

    public function CierraModalNuevoLabel(){
        $this->dispatch('CierraModalLabelFoto');
    }

    public function GuardaNuevaEtiqueta(){
        $this->validate([
            'NuevoLabel'=>'required',
        ]);
        ImportaPlantasModel::where('imp_id',$this->impid)->update([
            'imp_fotolabel'.$this->FotoLabelCambiante=>$this->NuevoLabel,
        ]);
        $this->dispatch('CierraModalLabelFoto');
        redirect('/importaPlantas_ver/'.$this->impid);
    }

    public function GuardarDatos(){
        $this->validate([
            'NvoCamellon'=>'required',
            'NvoX'=>'required|numeric',
            'NvoY'=>'required|numeric',
        ]);

        ##### Guarda datos
        ImportaPlantasModel::where('imp_id',$this->impid)->update([
            'imp_label'=>$this->NvoLabel,
            'imp_camellon'=>$this->NvoCamellon,
            'imp_sciname'=>$this->NvoSciname,
            'imp_comname'=>$this->NvoComname,
            'imp_x'=>$this->NvoX,
            'imp_y'=>$this->NvoY,
            'imp_obsejemplar'=>$this->NvoObsejemplar,
            'imp_obsubica'=>$this->NvoObsubica,
            'imp_obscaptura'=>$this->NvoObscaptura,
            'imp_fotolugar'=>$this->Nvofotolugar,
            'imp_foto1'=>$this->Nvofoto1,
            'imp_foto2'=>$this->Nvofoto2,
            'imp_foto3'=>$this->Nvofoto3,
            'imp_foto4'=>$this->Nvofoto4,
            'imp_foto5'=>$this->Nvofoto5,
            'imp_flag1'=>$this->flag1,
            'imp_flag2'=>$this->flag2,
            'imp_flag3'=>$this->flag3,
            'imp_flag4'=>$this->flag4,
            'imp_flag5'=>$this->flag5,
            'imp_kew'=>$this->Especie,
            'imp_iconid'=>$this->NvoIcono,
        ]);
        redirect('/importaPlantas_ver/'.$this->impid);
    }

    public function IncorporarAcoleccion(){
        ############ Se van a guardar todos los datos ingresados:
        ############ Tabla pl_plantas, pl_jardinsig, pl_scinames, pl_comnames y pl_fotos
        ############ OJO: pl_idcolecta debe ser único y en pl_scinames no debe haber +de1 scn_act=1 por scn_id

        ##### Valida datos
        $this->validate([
            'NvoCamellon'=>'required',
            'NvoLabel'=>'required|unique:pl_plantas,pl_idcolecta',
            'NvoX'=>'required|numeric',
            'NvoY'=>'required|numeric',
        ]);
        if($this->Nvofotolugar != ''){$this->validate(['Nvofotolabellugar'=>'required']);}
        if($this->Nvofoto1 != ''){$this->validate(['Nvofotolabel1'=>'required']);}
        if($this->Nvofoto2 != ''){$this->validate(['Nvofotolabel2'=>'required']);}
        if($this->Nvofoto3 != ''){$this->validate(['Nvofotolabel3'=>'required']);}
        if($this->Nvofoto4 != ''){$this->validate(['Nvofotolabel4'=>'required']);}
        if($this->Nvofoto5 != ''){$this->validate(['Nvofotolabel5'=>'required']);}

        ##### Prepara datos de observaciones para incorporar como un campo (obs de ubicación va a sig)
        if($this->NvoObsejemplar !=''){$Obs1='ObsCapturaEjemplar:'.$this->NvoObsejemplar.";";}else{$Obs1='';}
        if($this->NvoObscaptura !=''){$Obs2='ObsCaptura:'.$this->NvoObscaptura.";";}else{$Obs2='';}

        #####Guarda datos de tabla central (Plantas) y obtiene pl_id
        $NvoId=PlantasModel::create([
            'pl_idcolecta'=>$this->NvoLabel,
            'pl_act'=>'1',
            'pl_coleccion'=>'1', ##### Jwath?
            'pl_plantula'=>'0', ##### Jwath?
            'pl_obs'=>$Obs1.$Obs2,
        ]);

        ##### Guarda datos del sig de la planta
        JardinSigModel::create([
            'sig_plid'=>$NvoId->pl_id,
            'sig_act'=>'1',
            'sig_camid'=>CatCamellonesModel::where('cam_camellon',$this->NvoCamellon)->first()->cam_id,
            'sig_campus'=>CatCamellonesModel::where('cam_camellon',$this->NvoCamellon)->first()->cam_ccamid,
            'sig_x'=>$this->NvoX,
            'sig_y'=>$this->NvoY,
            'sig_identificador'=>$this->NvoLabel,
            'sig_iconid'=>$this->NvoIcono,
            'sig_notas'=>$this->NvoObsubica,
            'sig_flag1'=>$this->flag1,
            'sig_flag2'=>$this->flag2,
            'sig_flag3'=>$this->flag3,
            'sig_flag4'=>$this->flag4,
            'sig_flag5'=>$this->flag5,
            'sig_usr'=>Auth::user()->id,
        ]);

        ##### Guarda datos de nombre científico
        if($this->NvoSciname != '' OR $this->Especie > 0){
            if($this->Especie > 0){
                SciNamesModel::create([
                    'scn_plid'=>$NvoId->pl_id,
                    'scn_act'=>'1',
                    'scn_ckewtaxonid'=>$this->Especie,
                    'scn_tipo'=>'1',
                    'scn_fam'=>CatKewModel::where('ckew_taxonid',$this->Especie)->first()->ckew_family,
                    'scn_gen'=>CatKewModel::where('ckew_taxonid',$this->Especie)->first()->ckew_genus,
                    'scn_sp'=>CatKewModel::where('ckew_taxonid',$this->Especie)->first()->ckew_specificepithet,
                    'scn_ssp'=>CatKewModel::where('ckew_taxonid',$this->Especie)->first()->ckew_infraspecificepithet,
                    'scn_nombre'=>CatKewModel::where('ckew_taxonid',$this->Especie)->first()->ckew_scientfiicname,
                    'scn_usr'=>Auth::user()->id,
                ]);
            }else{
                SciNamesModel::create([
                    'scn_plid'=>$NvoId->pl_id,
                    'scn_act'=>'1',
                    'scn_ckewtaxonid'=>null,
                    'scn_tipo'=>'0',
                    'scn_fam'=>null,
                    'scn_gen'=>null,
                    'scn_sp'=>null,
                    'scn_ssp'=>null,
                    'scn_nombre'=>$this->NvoSciname,
                    'scn_usr'=>Auth::user()->id,
                ]);
            }
        }

        ##### Guarda datos de nombre común
        if($this->NvoComname != ''){
            ComNamesModel::create([
                'comn_plid'=>$NvoId->pl_id,
                'comn_act'=>'1',
                'comn_nombre'=>$this->NvoComname,
                'comn_clenid'=>$this->NvoLengua,
                #'comn_regiones'=>'',
                'comn_tipo'=>'0',
                'comn_usr'=>Auth::id(),
            ]);
        }

        $NvoIdConCeros='img'.str_pad($NvoId->pl_id, 5, "0", STR_PAD_LEFT);
        #dd($NvoIdConCeros, $this->Nvofotolugar->getClientOriginalExtension());
        ##### Guarda imágen de lugar y su etiqueta
        if($this->Nvofotolugar != '' AND  Storage::exists('/aPublic/cargaMasiva/'.$this->Nvofotolugar) ){
            $ChName=$NvoIdConCeros.'_'.$this->Nvofotolugar;
            Storage::move('/aPublic/cargaMasiva/'.$this->Nvofotolugar, '/aPublic/plantasFotos/'.$ChName);

            FotosPlantasModel::create([
                'img_plid'=> $NvoId->pl_id,
                'img_act'=> '1',
                'img_file'=> $ChName,
                'img_label'=> $this->Nvofotolabellugar,
                'img_autor'=> null,
                'img_titulo'=> null,
                'img_date'=> null,
            ]);

        }
        ##### Guarda imágen 1 y su etiqueta
        if($this->Nvofoto1 != '' AND  Storage::exists('/aPublic/cargaMasiva/'.$this->Nvofoto1) ){
            $ChName=$NvoIdConCeros.'_'.$this->Nvofoto1;
            Storage::move('/aPublic/cargaMasiva/'.$this->Nvofoto1, '/aPublic/plantasFotos/'.$ChName);

            FotosPlantasModel::create([
                'img_plid'=> $NvoId->pl_id,
                'img_act'=> '1',
                'img_file'=> $ChName,
                'img_label'=> $this->Nvofotolabel1,
                'img_autor'=> null,
                'img_titulo'=> null,
                'img_date'=> null,
            ]);
        }
        ##### Guarda imágen 2 y su etiqueta
        if($this->Nvofoto2 != '' AND  Storage::exists('/aPublic/cargaMasiva/'.$this->Nvofoto2) ){
            $ChName=$NvoIdConCeros.'_'.$this->Nvofoto2;
            Storage::move('/aPublic/cargaMasiva/'.$this->Nvofoto2, '/aPublic/plantasFotos/'.$ChName);

            FotosPlantasModel::create([
                'img_plid'=> $NvoId->pl_id,
                'img_act'=> '1',
                'img_file'=> $ChName,
                'img_label'=> $this->Nvofotolabel2,
                'img_autor'=> null,
                'img_titulo'=> null,
                'img_date'=> null,
            ]);
        }
        ##### Guarda imágen 3 y su etiqueta
        if($this->Nvofoto3 != '' AND  Storage::exists('/aPublic/cargaMasiva/'.$this->Nvofoto3) ){
            $ChName=$NvoIdConCeros.'_'.$this->Nvofoto3;
            Storage::move('/aPublic/cargaMasiva/'.$this->Nvofoto3, '/aPublic/plantasFotos/'.$ChName);

            FotosPlantasModel::create([
                'img_plid'=> $NvoId->pl_id,
                'img_act'=> '1',
                'img_file'=> $ChName,
                'img_label'=> $this->Nvofotolabel3,
                'img_autor'=> null,
                'img_titulo'=> null,
                'img_date'=> null,
            ]);
        }
        ##### Guarda imágen 4 y su etiqueta
        if($this->Nvofoto4 != '' AND  Storage::exists('/aPublic/cargaMasiva/'.$this->Nvofoto4) ){
            $ChName=$NvoIdConCeros.'_'.$this->Nvofoto4;
            Storage::move('/aPublic/cargaMasiva/'.$this->Nvofoto4, '/aPublic/plantasFotos/'.$ChName);

            FotosPlantasModel::create([
                'img_plid'=> $NvoId->pl_id,
                'img_act'=> '1',
                'img_file'=> $ChName,
                'img_label'=> $this->Nvofotolabel4,
                'img_autor'=> null,
                'img_titulo'=> null,
                'img_date'=> null,
            ]);
        }
        ##### Guarda imágen 5 y su etiqueta
        if($this->Nvofoto5 != '' AND  Storage::exists('/aPublic/cargaMasiva/'.$this->Nvofoto5) ){
            $ChName=$NvoIdConCeros.'_'.$this->Nvofoto5;
            Storage::move('/aPublic/cargaMasiva/'.$this->Nvofoto5, '/aPublic/plantasFotos/'.$ChName);

            FotosPlantasModel::create([
                'img_plid'=> $NvoId->pl_id,
                'img_act'=> '1',
                'img_file'=> $ChName,
                'img_label'=> $this->Nvofotolabel5,
                'img_autor'=> null,
                'img_titulo'=> null,
                'img_date'=> null,
            ]);
        }
        ##### Borra registro de paso
        ImportaPlantasModel::where('imp_id',$this->impid)->delete();
        #redirect('/importaPlantas_ver/'.$this->NextID);
        redirect('/importaPlantas/');
    }

    public function render(){
        ##### Carga datos del ejemplar, de su camellón, de su campus y su jardín.
        $base=DB::table('pl_import')
            ->join('cat_camellones','pl_import.imp_camellon','cat_camellones.cam_camellon')
            ->join('cat_campus','cat_camellones.cam_ccamid','cat_campus.ccam_id')
            ->join('cat_jardines','cat_campus.ccam_cjarid','cat_jardines.cjar_id')
            ->where('imp_id',$this->impid)
            ->where('imp_act','1')
            ->first();

        ##### Genera geoJson de todos los camellones
        $mapas=CatCamellonesModel::where('cam_ccamid',$base->cam_ccamid)->get();
        $camellones=[];
        foreach($mapas as $i){
            array_push($camellones, $i->cam_mapa);
        }
        $camellones=implode(',',$camellones);

        ##### Carga de otros puntos de plantas dentro del camellón
        $puntos=ImportaPlantasModel::where('imp_camellon',$base->imp_camellon)
            ->where('imp_act','1')
            ->select('imp_id','imp_label','imp_sciname','imp_sciname','imp_x','imp_y')
            ->get();

        ##### Carga registro preexiwtentes de ejemplares en el sistema en el camellón
        $puntoscolect=JardinSigModel::where('sig_camid',$base->cam_id)
            ->where('sig_act','1')
            ->join('cat_iconos','sig_iconid','=','icon_id')
            ->select('sig_x','sig_y','sig_plid','sig_iconid','sig_identificador','icon_file','icon_sizex','icon_sizey')
            ->get();
#dd($base,$puntoscolect);
        ##### Obtiene relación de camellones
        $NombreCamellones=CatCamellonesModel::join('cat_campus','cat_camellones.cam_ccamid','cat_campus.ccam_id')
            ->join('cat_jardines','cat_campus.ccam_cjarid','cat_jardines.cjar_id')
            ->select('cam_id','cam_camellon','ccam_name','cjar_nombre','cjar_siglas')
            ->get();

        return view('livewire.plantas.importa-plantas-component2',[
            'base'=>$base,
            'camellones'=>$camellones,
            'puntos'=>$puntos,
            'puntoscolect'=>$puntoscolect,
            'NombreCamellones'=>$NombreCamellones,
            'iconos'=>CatIconosModel::where('icon_coleccion','plantas',)->select('icon_id','icon_nombre','icon_file')->get(),
            'lenguas'=>CatLenguasModel::select('clen_id','clen_nombre')->get(),
            'Etiquetas'=>CatEtiquetasImgModel::where('cimg_gral','plantas')->where('cimg_tipo','ejemplar')->select('cimg_id','cimg_name')->get(),
        ]);
    }
}
