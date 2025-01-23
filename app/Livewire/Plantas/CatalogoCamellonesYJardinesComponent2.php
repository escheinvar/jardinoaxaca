<?php

namespace App\Livewire\Plantas;

use App\Models\CatCamellonesModel;
use App\Models\CatCampusModel;
use App\Models\CatJardinesModel;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout('plantillas.PlantillaSistemaBase')]
class CatalogoCamellonesYJardinesComponent2 extends Component
{
    use WithFileUploads;

    public $camID;
    public $NvoJardin, $NvoCamellon, $Nvocamellonname, $Nvozona, $Nvozonaname, $Nvogeojsonfile,$NvoMapa, $Nvoctrox, $Nvoctroy, $Nvozoom;

    public function mount($camID){
        $this->camID=$camID; ### CamID=variable que contiene URL


        ##### Filtra url a sólo número (\D=No digitos)
        if(preg_match('/\D/',$camID)){
            redirect('/errorURL incorrecta');
        }
        $camellon=CatCamellonesModel::join('cat_campus','cam_ccamid','=','ccam_id')
            ->join('cat_jardines','ccam_cjarid','=','cjar_id')
            ->where('cam_id',$camID)
            ->first();
        if($camID !='0' AND $camellon == ''  ){
            redirect('/errorNo existe el camellón '.$camID);
        }
        ##### Carga datos
        if($this->camID == '0'){
            $this->NvoJardin='';
            $this->NvoCamellon='';
            $this->Nvocamellonname='';
            $this->Nvozona='';
            $this->Nvozonaname='';
            $this->Nvoctrox='-96.7221';
            $this->Nvoctroy='17.0658';
            $this->Nvozoom='21';
            $this->NvoMapa='';
            #$this->NvoMapa=CatCamellonesModel::where('cam_id','2')->first()->value('cam_mapa');
        }else{
            $this->NvoJardin=$camellon->ccam_id;
            $this->NvoCamellon=$camellon->cam_camellon;
            $this->Nvocamellonname=$camellon->cam_camellonname;
            $this->Nvozona=$camellon->cam_zona;
            $this->Nvozonaname=$camellon->cam_zonaname;
            $this->Nvoctrox=$camellon->cam_ctrox;
            $this->Nvoctroy=$camellon->cam_ctroy;
            $this->Nvozoom=$camellon->cam_zoom;
            $this->NvoMapa=$camellon->cam_mapa;
        }
    }

    public function VerMapa(){
        $this->validate([
            'NvoJardin'=>'required',
            'NvoCamellon'=>'required|unique:cat_camellones,cam_camellon,'.$this->camID.',cam_id',
            'Nvocamellonname'=>'required',
            'Nvogeojsonfile'=>'required',
        ]);

        $this->NvoMapa = file_get_contents($this->Nvogeojsonfile->getRealPath() );
        $nuevo=CatCamellonesModel::create([
            'cam_ccamid'=>$this->NvoJardin,
            'cam_camellon'=>$this->NvoCamellon,
            'cam_zona'=>$this->Nvozona,
            'cam_zonaname'=>$this->Nvozonaname,
            'cam_camellonname'=>$this->Nvocamellonname,
            #'cam_color'=>$this->Nvo,
            #'cam_notas'=>$this->Nvo,
            'cam_mapa'=>$this->NvoMapa,
            'cam_ctrox'=>$this->Nvoctrox,
            'cam_ctroy'=>$this->Nvoctroy,
            'cam_zoom'=>$this->Nvozoom,
        ]);
        redirect('/catalogo/camellon/'.$nuevo->cam_id);
    }

    public function GuardaCamellon(){
        ##### Falta validar que sí haya mapa!!!!
        $this->validate([
            'NvoJardin'=>'required',
            'NvoCamellon'=>'required|unique:cat_camellones,cam_camellon,'.$this->camID.',cam_id',
            #'Nvocamellonname'=>'required',
            'NvoMapa'=>'required',
            'Nvoctrox'=>'required',
            'Nvoctroy'=>'required',
            'Nvozoom'=>'required',
        ]);

        CatCamellonesModel::where('cam_id',$this->camID)->update([
            'cam_ccamid'=>$this->NvoJardin,
            'cam_camellon'=>$this->NvoCamellon,
            'cam_zona'=>$this->Nvozona,
            'cam_zonaname'=>$this->Nvozonaname,
            'cam_camellonname'=>$this->Nvocamellonname,
            #'cam_color'=>$this->Nvo,
            #'cam_notas'=>$this->Nvo,
            'cam_ctrox'=>$this->Nvoctrox,
            'cam_ctroy'=>$this->Nvoctroy,
            'cam_zoom'=>$this->Nvozoom,
        ]);

        redirect('/catalogo/camellon/'.$this->camID);

    }


    public function CambiaCentro(){
        $this->dispatch('CapturaCoordenadas');
    }

    public function BorrarMapa(){

    }

    public function render(){
        $jardines=CatCampusModel::join('cat_jardines','cjar_id','=','ccam_cjarid')
            ->where('ccam_act','1')
            ->select('cjar_id','cjar_name','cjar_logo', 'ccam_id','ccam_name','ccam_nombre')
            ->orderBy('cjar_name','asc')
            ->orderBy('ccam_name','asc')
            ->get();
        if($this->NvoJardin ==''){
            $camellones='';

        }else{
            ##### Genera geoJson de todos los camellones
            $mapas=CatCamellonesModel::where('cam_ccamid',$this->NvoJardin)->OrderBy('cam_id')->get();
            $camellones=[];
            foreach($mapas as $i){
                array_push($camellones, $i->cam_mapa);
            }
            $camellones=implode(',',$camellones);
            ##### Lista de IDs
            $listaDeIds=$mapas->pluck('cam_id')->toArray();
            $key=array_keys($listaDeIds, $this->camID)[0];
        }

        #dd($listaDeIds, $listaDeIds[$key+1], $listaDeIds[$key-1]);
        return view('livewire.plantas.catalogo-camellones-y-jardines-component2',[
            'jardines'=>$jardines,
            'camellones'=>$camellones,

        ]);
    }
}
