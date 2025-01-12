<?php

namespace App\Livewire\Plantas;

use App\Imports\ImportaPlantas;
use App\Models\CatCamellonesModel;
use App\Models\CatCampusModel;
use App\Models\CatIconosModel;
use App\Models\CatKewModel;
use App\Models\ImportaPlantasModel;
use App\Models\PlantasModel;
use Database\Seeders\CatCamellonesSeeder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Facades\Storage;



#[Layout('plantillas.PlantillaSistemaBase')]
class ImportaPlantasComponent2 extends Component
{
    Use WithFileUploads;

    public $impid;
    public $NvoCamellon, $NvoLabel, $NvoComname, $NvoSciname, $Genero, $Especie, $NvoX, $NvoY;
    public $NvoIcono,$SubeFotoLugar,$SubeFotoPlanta, $Nvofoto1, $Nvofoto2, $Nvofoto3, $Nvofoto4, $Nvofoto5, $Nvofotolugar, $flag1, $flag2, $flag3, $flag4, $flag5;
    public $NvoObsejemplar, $NvoObsubica, $NvoObscaptura;
    public $especies,$nespecies;
    public $NextID, $PrevID,$BotonMoverPlanta;

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
        $this->NvoSciname = $Datos->imp_sciname;
        $this->especies=collect();
        $this->NvoX = $Datos->imp_x;
        $this->NvoY = $Datos->imp_y;
        $this->Nvofoto1 = $Datos->imp_foto1;
        $this->Nvofoto2 = $Datos->imp_foto2;
        $this->Nvofoto3 = $Datos->imp_foto3;
        $this->Nvofoto4 = $Datos->imp_foto4;
        $this->Nvofoto5 = $Datos->imp_foto5;
        $this->Nvofotolugar = $Datos->imp_fotolugar;
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
        ImportaPlantasModel::where('imp_id',$this->impid)->update(['imp_foto'.$foto=>NULL]);
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
        ##### Valida datos
        $this->validate([
            'NvoCamellon'=>'required',
            'NvoLabel'=>'required|unique:pl_plantas','idcolecta',
            'NvoX'=>'required|numeric',
            'NvoY'=>'required|numeric',
        ]);

        ##### Guarda datos de ubicación en jardín

        #####Guarda datos de tabla central (Plantas)
        PlantasModel::create([
            'pl_idcolecta'=>$this->NvoLabel,
            'pl_act'=>'1',
            'pl_coleccion'=>'1', ##### Jwath?
            'pl_plantula'=>'1', ##### Jwath?
        ]);

        dd('incorporar');
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
        #$puntos=PlantasModel::where(); ##### OJOOOOO: HAY QUE CAMBIAR POR EL DE REGISTROS VALIDADOS
        $puntos=ImportaPlantasModel::where('imp_camellon',$base->imp_camellon)
            ->where('imp_act','1')
            ->select('imp_id','imp_label','imp_sciname','imp_sciname','imp_x','imp_y')
            ->get();

        ##### Obtiene relación de camellones
        $NombreCamellones=CatCamellonesModel::join('cat_campus','cat_camellones.cam_ccamid','cat_campus.ccam_id')
            ->join('cat_jardines','cat_campus.ccam_cjarid','cat_jardines.cjar_id')
            ->select('cam_id','cam_camellon','ccam_name','cjar_nombre','cjar_siglas')
            ->get();

        return view('livewire.plantas.importa-plantas-component2',[
            'base'=>$base,
            'camellones'=>$camellones,
            'puntos'=>$puntos,
            'NombreCamellones'=>$NombreCamellones,
            'iconos'=>CatIconosModel::where('icon_coleccion','plantas',)->select('icon_id','icon_nombre','icon_file')->get(),
        ]);
    }
}
