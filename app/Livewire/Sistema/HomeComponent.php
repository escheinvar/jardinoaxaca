<?php

namespace App\Livewire\Sistema;

use App\Models\CatRolesModel;
use App\Models\SistBuzonMensajesModel;
use App\Models\SpAporteUsrsModel;
use App\Models\UserRolesModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('components.layouts.SistemaBase')]
class HomeComponent extends Component
{
    public $MisAportes;

    public function mount(){
        $this->MisAportes='0';
    }

    public function VerNoverAportes(){
        if($this->MisAportes=='0'){
            $this->MisAportes='1';
        }else{
            $this->MisAportes='0';
        }
    }

    public function CambiaEdoMsg($idmsg,$edo){
        SpAporteUsrsModel::where('msg_id',$idmsg)->update(['msg_edo'=>$edo]);
    }

    public function BorrarMsg($idmsg){
        SpAporteUsrsModel::where('msg_id',$idmsg)->update(['msg_act'=>'0']);
    }

    public function render(){
        #### Obtiene roles (por si saltó desde index a home)
        $roles=UserRolesModel::where('rol_act','1')->where('rol_usrid',Auth::id())->pluck('rol_crolrol')->toArray();

        ##### Guarda variables de usuario,
        session([
            'rol'=>$roles,
            'locale'=>'es',
            'locale2'=>'spa',
        ]);

        ##### Recupera el número de mensajes sin leer
        $buzon= SistBuzonMensajesModel::where('buz_act','1')
            ->where(function($q){
                return $q
                ->where('buz_destino_usr',Auth::id())
                ->orWhereIn('buz_destino_rol',session('rol'));
            })
            ->where('buz_act','1')
            ->where('buz_leido','0')
            ->count();

        ##### Recupera las aportaciones "Yo tengo algo que aportar"
        $aporta=SpAporteUsrsModel::where('msg_act','1')
            ->where('msg_usr',Auth::user()->id)
            ->leftJoin('sp_urlcedula','ced_id','=','msg_cedid')
            ->orderBy('msg_id','asc')
            ->get();

        ##### Recupera aportaciones a revisar
        $aporta=SpAporteUsrsModel::where('msg_act','1')
            ->where('msg_usr',Auth::user()->id)
            ->leftJoin('sp_urlcedula','ced_id','=','msg_cedid')
            ->orderBy('msg_date','desc')
            ->get();
        ##### Recupera cantidad de aportaciones PENDIENTES DE APROBAR
        $revisa=SpAporteUsrsModel::where('msg_act','1')
            ->where('msg_edo','0')
            ->count();

        return view('livewire.sistema.home-component',[
            'buzon'=>$buzon,
            'aporta'=>$aporta,
            'revisa'=>$revisa,
        ]);
    }
}
