<?php

namespace App\Livewire\Web;

use App\Models\WebEventosModel;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class EventosController extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $Cantidad;
    public $titulo, $lugar, $descripcion, $descripcion2, $tipo, $fechaIni, $horaIni, $fechaFin, $horaFin, $costo, $imagen;

    public function mount(){
        $this->Cantidad='3';
        $this->lugar='Biblioteca del Jardín Etnobiológico de Oaxaca';
        $this->costo='Actividad gratuita';
    }

    public function Guardar(){
        ##### Valida campos
        $this->validate([
            'titulo'=>'required',
            'lugar'=>'required',
            'descripcion'=>'required',
            'tipo'=>'required',
            'fechaIni'=>'required',
            'horaIni'=>'required',
            'fechaFin'=>'after_or_equal:fechaIni',
        ]);
        ##### Prepara variables
        $tipo=implode(',',$this->tipo);
        if($this->fechaIni == $this->fechaFin AND $this->horaFin < $this->horaIni){
            $this->horaFin=$this->horaIni;
        }
        if($this->costo =='' or $this->costo <= '0'){
            $this->costo='Actividad gratuita';
        }
        if($this->imagen == null OR $this->imagen ==''){
            $img='/imagenes/eventos/evento.png';
        }else{
            ##### Prepara nombre
            $quitar=array(' ','!','"','$','%','&','/','(',')','=','?','\'','¿','¡','*');
            $nombre=date("ymd", strtotime($this->fechaIni)).'_'.str_replace($quitar,'',$this->titulo).'.'.$this->imagen->getClientOriginalExtension();
            ##### Guarda imagen
            $this->imagen->storeAs(path:'/aPublic/imagenes/eventos/', name:$nombre);
            $img='/imagenes/eventos/'.$nombre;
        }

        ##### Guarda variables en tabla
        WebEventosModel::create([
            'wwevs_act'=>'1',
            'wwevs_titulo'=>$this->titulo,
            'wwevs_descrip'=>$this->descripcion,
            'wwevs_descrip2'=>$this->descripcion2,
            'wwevs_label'=>$tipo,
            'wwevs_lugar'=>$this->lugar,
            'wwevs_dateini'=>$this->fechaIni,
            'wwevs_datefin'=>$this->fechaFin,
            'wwevs_timeini'=>$this->horaIni,
            'wwevs_timefin'=>$this->horaFin,
            'wwevs_costo'=>$this->costo,
            'wwevs_img'=>$img,
        ]);
        return redirect('/actividades');
    }

    public function Borrar($id){
        WebEventosModel::where('wwevs_id',$id)->update([
            'wwevs_act'=>'0',
        ]);
    }

    public function render() {
        // $eventos=WebEventosModel::where('wwevs_act','1')->OrderBy('wwevs_dateini')->get();
        $mes=['no','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
        $prox=WebEventosModel::where('wwevs_act','1')->OrderBy('wwevs_dateini','asc')->where('wwevs_datefin','>=',now())->get();
        $past=WebEventosModel::where('wwevs_act','1')->OrderBy('wwevs_dateini','desc')->where('wwevs_datefin','<',now())->paginate($this->Cantidad);
        #dd($prox);
        return view('livewire.web.eventos-controller',[
            'eventosProx'=>$prox,
            'eventosPast'=>$past,
            'mes'=>$mes,
        ]);
    }
}
