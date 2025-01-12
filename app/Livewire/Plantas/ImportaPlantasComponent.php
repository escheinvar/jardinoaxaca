<?php

namespace App\Livewire\Plantas;

use App\Exports\ExportaPlantas;
use App\Imports\ImportaPlantas;
use App\Models\CatCamellonesModel;
use App\Models\ImportaPlantasModel;
use App\Models\PlantasModel;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('plantillas.PlantillaSistemaBase')]
class ImportaPlantasComponent extends Component
{

    use WithFileUploads;
    #use WithPagination;
    #[Validate(['fotos.*'=>'image'])] // 10MB Max
    public $file, $fotos, $errores, $orden,$sent;

    public function mount(){
        $this->errores='0';
        $this->orden='imp_id';
        $this->sent='asc';

    }

    public function ordenTabla($orden){
        $this->orden=$orden;
        if($this->sent=='asc'){
            $this->sent='desc';
        }else{
            $this->sent='asc';
        }
    }

    public function importFile(){
        $this->validate([
            'file' => 'required|mimes:xls,xlsx,csv,ods',
        ]);

        Excel::import(new ImportaPlantas, $this->file->path());
        session()->flash('message', 'Archivo cargado exitosamente.');
        return redirect('/importaPlantas');
    }

    public function save(){
        // $this->validate([
        //     #'fotos' => 'required|mimes:png,jpg,jpeg',
        //     'fotos'=> 'image',
        // ]);

        foreach($this->fotos as $i){
            $nombre=$i->getClientOriginalName();
            $i->storeAs(path:'/aPublic/cargaMasiva',name:$nombre);
        }

        #session()->flash('message2', 'Fotografías cargadas exitosamente.');
        $this->resetErrorBag();
        return redirect('/importaPlantas');
    }

    public function exportFile(){
        return Excel::download(new ExportaPlantas, 'CargaDePlantas.xlsx');
    }

    public function delete($id){
        ImportaPlantasModel::find($id)->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
    }

    public function pause($id){
        $estado=ImportaPlantasModel::where('imp_id',$id)->pluck('imp_act');

        if($estado[0]=='0'){
            $nuevo='1';
            $msj='Registro pausado existosamente.';
        }else{
            $nuevo='0';
            $msj='Registro reactivado existosamente.';
        }
        ImportaPlantasModel::find($id)->update(['imp_act'=>$nuevo]);
        session()->flash('message', $msj);
    }

    public function Desagrupar($id){
        $original=ImportaPlantasModel::where('imp_id',$id)->first();
        $label=$original->imp_label;
        $reps= array_fill(1,$original->imp_comunidad,'1');

        $num='0';
        foreach($reps as $i){
            $num++;
            ##### Copia archivos de fotos
            if(!is_null($original->imp_fotolugar)) {
                $fotoNuevalugar = $original->imp_id.'copia'.$num.'_'.$original->imp_fotolugar;
                Storage::copy('/aPublic/cargaMasiva/'.$original->imp_fotolugar,'/aPublic/cargaMasiva/'.$fotoNuevalugar);
            }else{ $fotoNuevalugar = null; }
            ##### Copia archivos de fotos
            if(!is_null($original->imp_foto1)) {
                $fotoNueva1 = $original->imp_id.'copia'.$num.'_'.$original->imp_foto1;
                Storage::copy('/aPublic/cargaMasiva/'.$original->imp_foto1,'/aPublic/cargaMasiva/'.$fotoNueva1);
            }else{ $fotoNueva1 = null; }
            ##### Copia archivos de fotos
            if(!is_null($original->imp_foto2)) {
                $fotoNueva2 = $original->imp_id.'copia'.$num.'_'.$original->imp_foto;
                Storage::copy('/aPublic/cargaMasiva/'.$original->imp_foto2,'/aPublic/cargaMasiva/'.$fotoNueva2);
            }else{ $fotoNueva2 = null; }
            ##### Copia archivos de fotos
            if(!is_null($original->imp_foto3)) {
                $fotoNueva3 = $original->imp_id.'copia'.$num.'_'.$original->imp_foto;
                Storage::copy('/aPublic/cargaMasiva/'.$original->imp_foto3,'/aPublic/cargaMasiva/'.$fotoNueva3);
            }else{ $fotoNueva3 = null; }
            ##### Copia archivos de fotos
            if(!is_null($original->imp_foto4)) {
                $fotoNueva4 = $original->imp_id.'copia'.$num.'_'.$original->imp_foto;
                Storage::copy('/aPublic/cargaMasiva/'.$original->imp_foto4,'/aPublic/cargaMasiva/'.$fotoNueva4);
            }else{ $fotoNueva4 = null; }
            ##### Copia archivos de fotos
            if(!is_null($original->imp_foto5)) {
                $fotoNueva5 = $original->imp_id.'copia'.$num.'_'.$original->imp_foto;
                Storage::copy('/aPublic/cargaMasiva/'.$original->imp_foto5,'/aPublic/cargaMasiva/'.$fotoNueva5);
            }else{ $fotoNueva5 = null; }

            ##### Genera nuevo registro
            $nuevo = $original->replicate()->fill([
                'imp_act'=>'1',
                'imp_label'=>$label.' [cp'.$num.' de '.$original->imp_id.']',
                'imp_comunidad'=>'1',
                'imp_x'=>$original->imp_x - (0.000001 * $num),
                'imp_y'=>$original->imp_y + (0.000001 * $num),
                'imp_fotolugar'=>$fotoNuevalugar,
                'imp_foto1'=>$fotoNueva1,
                'imp_foto2'=>$fotoNueva2,
                'imp_foto3'=>$fotoNueva3,
                'imp_foto4'=>$fotoNueva4,
                'imp_foto5'=>$fotoNueva5,
                'imp_obscaptura'=>$original->imp_obscaptura.' [copia '.$num.' de original '.$original->imp_id.']',
            ]);
            $nuevo->save();
        }
        ##### Borra archivos y registro
        Storage::delete('/aPublic/cargaMasiva/'.$original->imp_fotolugar);
        Storage::delete('/aPublic/cargaMasiva/'.$original->imp_foto1);
        Storage::delete('/aPublic/cargaMasiva/'.$original->imp_foto2);
        Storage::delete('/aPublic/cargaMasivxºa/'.$original->imp_foto3);
        Storage::delete('/aPublic/cargaMasiva/'.$original->imp_foto4);
        Storage::delete('/aPublic/cargaMasiva/'.$original->imp_foto5);
        $original=ImportaPlantasModel::where('imp_id',$id)->delete();
    }


    public function render(){
        $items = ImportaPlantasModel::orderBy($this->orden,$this->sent)->get();
        $files=scandir('cargaMasiva/');
        $camellones=CatCamellonesModel::pluck('cam_camellon')->ToArray();
        #$camellones=array_map('strtolower',$camellones);
        $labels1=PlantasModel::pluck('pl_idcolecta')->ToArray();
        #$labels2=ImportaPlantasModel::pluck('imp_label')->ToArray();

        return view('livewire.plantas.importa-plantas-component', [
            'items' => $items,
            'imagenes'=> $files,
            'camellones'=>$camellones,
            'labels1'=>$labels1,

            #'labels2'=>$labels2,
        ]);
    }
}
