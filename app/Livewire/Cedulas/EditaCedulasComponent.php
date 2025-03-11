<?php

namespace App\Livewire\Cedulas;

use App\Models\CatEtiquetasImgModel;
use App\Models\CatJardinesModel;
use App\Models\SpCedulasModel;
use App\Models\SpFotosModel;
use App\Models\SpUrlCedulaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Termwind\Components\Span;

#[Layout('components.layouts.SistemaBase')]
class EditaCedulasComponent extends Component
{
    use WithFileUploads;

    public $cedID, $TxtIdEnEdicion, $codedit;
    public $NvoTitulo, $NvoOrder, $NvoCodigo,$NvoAudio, $NvaImagen, $NvaImagenTipo;

    public function mount($cedID){
        $this->cedID=$cedID;
        $this->TxtIdEnEdicion='0';
    }

    public function BorraFoto($foto){
        ##### Identifica la foto a borrar
        $datos=SpUrlCedulaModel::where('ced_id',$this->cedID)->first();
        $fotoID=SpFotosModel::where('imgsp_urlurl',$datos->ced_urlurl)
            ->where('imgsp_cjarsiglas',$datos->ced_cjarsiglas)
            ->where('imgsp_cimgname',$foto)
            ->first();

        ##### Borra el archivo de la foto
        Storage::delete('/aPublic/cedulas/'.$fotoID->imgsp_file);
        if($fotoID->imgsp_filelow != ''){
            Storage::delete('/aPublic/cedulas/'.$fotoID->imgsp_filelow);
        }

        ##### Borra foto en BD
        SpFotosModel::where('imgsp_id',$fotoID->imgsp_id)->update([
            'imgsp_act'=>'0',
        ]);
    }

    public function SubirFoto(){
        $this->validate([
            'NvaImagen'=>'required',
            'NvaImagenTipo'=>'required',
        ]);
        ##->Cargar metadatos?
        ##### Obtiene datos de cédula
        $urlced=SpUrlCedulaModel::where('ced_id',$this->cedID)
            ->join('sp_url','ced_urlurl','=','url_url')
            ->leftJoin('cat_lenguas','clen_code','=','ced_clencode')
            ->first();
        ##### Genera nuevo nombre de imágen
        $nombre=$urlced->ced_urlurl."_".$urlced->ced_cjarsiglas."_".$this->NvaImagenTipo.".".$this->NvaImagen->getClientOriginalExtension();
        ##### Guarda la imágen como archivo y en BD
        $this->NvaImagen->storeAs(path:'/aPublic/cedulas/',name:$nombre);
        SpFotosModel::create([
            'imgsp_urlurl'=>$urlced->ced_urlurl,
            'imgsp_cjarsiglas'=>$urlced->ced_cjarsiglas,
            'imgsp_file'=>$nombre,
            'imgsp_cimgname'=>$this->NvaImagenTipo,
        ]);
        $this->NvaImagen="";
        $this->NvaImagenTipo="";
        #dd($this->NvaImagen->getClientOriginalName(),$nombre);
    }

    public function DeterminaParrafoAeditar($id){
        $this->TxtIdEnEdicion=$id;
        $this->codedit=SpCedulasModel::where('txt_id',$id)->first();
        $this->NvoTitulo= $this->codedit->txt_titulo;
        $this->NvoOrder= $this->codedit->txt_order;
        $this->NvoCodigo= $this->codedit->txt_codigo;
    }

    public function CancelaCambio(){
        $this->TxtIdEnEdicion=null;
        $this->codedit=null;
        $this->NvoTitulo=null;
        $this->NvoOrder=null;
        $this->NvoCodigo=null;
    }

    public function GuardarCambios(){
        ##### Inactiva
        SpCedulasModel::where('txt_id',$this->TxtIdEnEdicion)->update([
            'txt_act'=>'0',
        ]);
        ##### Obtiene datos
        $datos=SpCedulasModel::where('txt_id',$this->TxtIdEnEdicion)->first();
        if($this->NvoAudio !=''){$audio=$this->NvoAudio;}else{$audio=$datos->txt_audio;}
        SpCedulasModel::create([
            'txt_cedid'=>$this->cedID,
            'txt_titulo'=>$this->NvoTitulo,
            'txt_order'=>$this->NvoOrder,
            'txt_codigo'=>$this->NvoCodigo,
            'txt_audio'=>$audio,
            'txt_autor'=>Auth::user()->id,
            'txt_version'=> SpCedulasModel::where('txt_id',$this->TxtIdEnEdicion)->value('txt_version') + 0.01,
        ]);
        #redirect('/editaCedula/'.$this->cedID);
    }

    public function NuevoParrafo(){
      SpCedulasModel::create([
        'txt_cedid'=>$this->cedID,
        'txt_titulo'=>'0',
        'txt_order'=>SpCedulasModel::where('txt_cedid',$this->cedID)->max('txt_order') + 1,
        'txt_codigo'=>'Lorem Ipsum...',
        #'txt_audio'=>null,
        'txt_autor'=>Auth::user()->id,
        'txt_version'=>'0.01',
      ]);
    }

    public function BorrarParrafo($id){
        ##### Busdca archivo de audio y lo borra (en su caso)
        $origen=SpCedulasModel::where('txt_id',$id)->first();
        #dd($id,$origen);
        if($origen->txt_audio != ''){
            Storage::delete('/aPublic/cedulas/audios/'.$origen->txt_audio);
        }

        SpCedulasModel::where('txt_id',$id)->update([
            'txt_act'=>'0',
        ]);
    }

    public function BorrarAudio($id){
        #### copia el registro
        $viejo=SpCedulasModel::where('txt_id',$id)->first();
        $nuevo= $viejo->replicate();
        $nuevo->save();

        ##### inactiva el viejo
        SpCedulasModel::where('txt_id',$id)->update([
            'txt_act'=>'0',
        ]);
        ##### Borra el archivo
        Storage::delete('/aPublic/cedulas/audios/'.$viejo->txt_audio);

        ##### Borra en BD el nuevo
        SpCedulasModel::where('txt_audio',$viejo->txt_audio)
            ->where('txt_codigo',$viejo->txt_codigo)
            ->where('txt_order',$viejo->txt_order)
            ->where('txt_id','!=',$viejo->txt_id)
            ->update([
                'txt_audio'=>null,
                'txt_autor'=>Auth::user()->id,
            ]);

        ##### Cambia la vista al nuevo
        $this->TxtIdEnEdicion=SpCedulasModel::where('txt_audio',null)
            ->where('txt_codigo',$viejo->txt_codigo)
            ->where('txt_order',$viejo->txt_order)
            ->where('txt_act','1')
            ->value('txt_id');
    }

    public function EnviarCedula(){
        dd('Finalizar: pasar de estado 0 a estado 2.');
    }

    public function render() {
        $urlced=SpUrlCedulaModel::where('ced_id',$this->cedID)
            ->join('sp_url','ced_urlurl','=','url_url')
            ->leftJoin('cat_lenguas','clen_code','=','ced_clencode')
            ->first();

        $textos=SpCedulasModel::where('txt_cedid',$this->cedID)
            ->where('txt_act','1')
            ->orderBy('txt_order')
            ->get();
        $fotos=SpFotosModel::where('imgsp_urlurl',$urlced->ced_urlurl)
            ->where('imgsp_cjarsiglas',$urlced->ced_cjarsiglas)
            ->where('imgsp_act','1')
            ->get();
        $jardinData=CatJardinesModel::where('cjar_siglas',$urlced->ced_cjarsiglas)->first();

        $version=[
            'ced_id'=>$urlced->ced_id,
            'cedula'=>$urlced->ced_urlurl.'/'.$urlced->ced_cjarsiglas.'/'.$urlced->ced_clencode,
            'ced_version'=>$urlced->ced_version,
            'ced_versiondate'=>$urlced->ced_versiondate,
            'ced_cita'=>$urlced->ced_cita,
        ];
        ##### Obtiene el listado de posición de imágenes ya utilizado
        $YaUsados=SpFotosModel::where('imgsp_urlurl',$urlced->ced_urlurl)
            ->where('imgsp_cjarsiglas',$urlced->ced_cjarsiglas)
            ->where('imgsp_act','1')
            ->pluck('imgsp_cimgname')
            ->toArray();
        ##### Obtiene catálogo de posición de imágenes y le saca los ya utilizados
        $tipoImgs=CatEtiquetasImgModel::where('cimg_gral','especie')
            ->where('cimg_tipo','cedula')
            ->select('cimg_name')
            ->whereNotIn('cimg_name',$YaUsados)
            ->get();

        return view('livewire.cedulas.edita-cedulas-component',[
            'urlced'=>$urlced,
            'texto'=>$textos,
            'titulos'=>$textos->where('txt_titulo','1'),
            'fotos'=>$fotos,
            'jardinData'=>$jardinData,
            'version'=>$version,
            'tipoImgs'=>$tipoImgs,
        ]);
    }
}
