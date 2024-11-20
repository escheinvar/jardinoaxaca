<?php

namespace App\Livewire\Sistema;

use App\Models\CatCamellonesModel;
use App\Models\CatEtiquetasImgModel;
use Livewire\Component;
use App\Models\CatKewModel;
use Livewire\Attributes\On;
use App\Models\EspeciesModel;
use App\Models\CatKewGensModel;
use Database\Seeders\CatCamellonesSeeder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.SistemaBase')]
class MapaComponent extends Component
{
    public $IdGanon, $taxonId, $kew, $especies,$nespecies,$Especie, $generos,$Genero, $NomCient, $Familia, $NomComun,$foto1,$foto2,$foto3,$foto4;
    public $Zona,$ClavoSiNo, $Clavo, $NotasUbica,$Observaciones,$Forma,$Revisado;
    public $label1;
    public $RipDate, $getCoords,$lat,$lng;
    public $MvePlanta, $NvaPlanta;
    public $NvoId, $NvoGenSp,$NvoNomCom,$OrigenDelNuevo,$TamanioDelNuevo;


    public function mount(){
        $this->IdGanon='';
        $this->especies=collect();
        $this->getCoords=['',''];
        $this->label1=['1','2'];
        $this->MvePlanta;
        $this->NvaPlanta='0';
        $this->OrigenDelNuevo='';
        $this->TamanioDelNuevo='';
    }

    
    public function ActivaNuevaPlanta(){
        $this->lat='';
        $this->lng='';
        $this->NvaPlanta='1';
        $this->MvePlanta='0';
        $this->dispatch('CapturaCoordenadas');
    }

    
    public function ActivaMuevePlanta(){
        $this->lat='';
        $this->lng='';
        $this->MvePlanta='1';
        $this->NvaPlanta='0';
        $this->dispatch('CapturaCoordenadas');
    }

    public function DesactivaCoordenadas(){
        $this->NvaPlanta='0';
        $this->MvePlanta='0';
        return redirect('/elmapa');
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
        #dd($especies->all());
    }

    public function AsignarTaxonId(){
        EspeciesModel::where('clave',$this->IdGanon)->update([
            'ckew_taxonid'=>$this->Especie,
        ]);
    }

    public function BorrarTaxonID(){
        EspeciesModel::where('clave',$this->IdGanon)->update([
            'ckew_taxonid'=>null,
        ]);
    }

    public function AgregarClavo(){
        //  
    }

    ///// Borra la foto especificada en el sistema
    public function BorrarFoto($foto){
        //$foto= 'FotosKobo/$foto' = nombre arch
    }
    
    ///// Guarda la edición de datos del ejemplar
    public function GuardarCambios(){
        EspeciesModel::where('clave',$this->IdGanon)->update([
            'generoyesp'=>$this->NomCient,
            'nombrecomu'=>$this->NomComun,
            'zona'=>$this->Zona,
            'hayclavo'=>$this->ClavoSiNo,
            'clavofisic'=>$this->Clavo,
            'notasubica'=>$this->NotasUbica,
            'observacio'=>$this->Observaciones,
            'forma'=>$this->Forma,
            'revised'=>$this->Revisado,
        ]);
        return redirect('/elmapa',['IdGanon'=>$this->IdGanon]);
    }
  
    public function RegistrarMuerte(){
        $this->validate([
            'RipDate'=>'required',
        ]);
        EspeciesModel::where('clave',$this->IdGanon)->update([
            'rip'=>'1',
        ]);
        $this->dispatch('CierraModal');
        return redirect('/elmapa');
    }

    public function CambiarUbicacion(){
        $this->validate([
            'lat'=>'required',
            'lng'=>'required',
        ]);

        EspeciesModel::where('clave',$this->IdGanon)->update([
            'x_corregid'=>$this->lng,
            'y_corregid'=>$this->lat,
        ]);
        return redirect('/elmapa');
    }
    
    
    public function VerModalNuevaPlanta(){
        $this->dispatch('MuestraModalPlantaNueva');
    }

    public function IngresarNuevaPlanta(){
        $this->validate([
            'NvoId'=>'required|unique:especies_prueba,clave',
        ]);
       EspeciesModel::create([
            'clave'=>$this->NvoId,
            'generoyesp'=>$this->NvoGenSp,
            'nombrecomu'=>$this->NvoNomCom,
            'x_corregid'=>$this->lng,
            'y_corregid'=>$this->lat
       ]);
        //$this->dispatch('CierraModalPlantaNueva');
        return redirect('/elmapa');
    }

    public function render(){
          if($this->IdGanon != ''){
            $ganon=DB::table('especies_prueba')
                ->OrderBy('zona')
                ->leftJoin('cat_kew_plantsoftheworld','especies_prueba.ckew_taxonid','=','cat_kew_plantsoftheworld.ckew_taxonid')
                ->where('clave',$this->IdGanon)
                ->first();
            $this->taxonId=$ganon->ckew_taxonid;
            if($this->taxonId != ''){
                $this->NomCient=$ganon->ckew_scientfiicname.' ['.$ganon->ckew_family.']';
                $this->Familia=$ganon->ckew_family;
                $this->kew=$ganon->ckew_references;
            }else{
                $this->NomCient=$ganon->generoyesp;
                $this->Familia='';
                $this->kew='';
            }
            $this->NomComun=$ganon->nombrecomu;
            $this->foto1=$ganon->foto1;
            $this->foto2=$ganon->foto2;
            $this->foto3=$ganon->foto3;
            $this->foto4=$ganon->archivo1;
            $this->Zona=$ganon->zona;
            if($ganon->hayclavo=='1'){ 
                $this->ClavoSiNo='1';
                $this->Clavo=$ganon->clavofisic;
            }else{ 
                $this->ClavoSiNo='0';
                $this->Clavo='';
            }
            $this->NotasUbica=$ganon->notasubica;
            $this->Observaciones=$ganon->observacio;
            $this->Forma=$ganon->forma;
            $this->Revisado=$ganon->revised;
            
        }else{
            $ganon='';
        }

        $puntos=DB::table('especies_prueba')
        ->where('rip','0')
        ->OrderBy('zona')
        ->get();

        return view('livewire.sistema.mapa-component',[
            'puntos'=>$puntos,
            'tipos'=>EspeciesModel::distinct('forma')->get('forma'),
            'camellones'=>CatCamellonesModel::distinct('cam_zona')->get('cam_zona'), 
            'labels'=>CatEtiquetasImgModel::where('cimg_gral','planta')->get(),
        ]);
    }
    
}


