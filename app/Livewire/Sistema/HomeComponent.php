<?php

namespace App\Livewire\Sistema;

use App\Models\CatRolesModel;
use App\Models\SistBuzonMensajesModel;
use App\Models\UserRolesModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('components.layouts.SistemaBase')]
class HomeComponent extends Component
{
    public function LeerMensaje($id){
        $estado=SistBuzonMensajesModel::where('buz_id',$id)->value('buz_leido');
        if($estado=='1'){
            $nuevo='0';
        }else{
            $nuevo='1';
        }
        SistBuzonMensajesModel::where('buz_id',$id)->update([
            'buz_leido'=>$nuevo,
        ]);
        #redirect('/home');
    }

    public function BorrarMensaje($id){
        SistBuzonMensajesModel::where('buz_id',$id)->update([
            'buz_act'=>'0',
        ]);
        redirect('/home');
    }

    public function render(){
        #dd(session('rol'));
        #### Obtiene roles (por si saltó desde index a home)
        $roles=UserRolesModel::where('rol_act','1')->where('rol_usrid',Auth::id())->pluck('rol_crolrol')->toArray();

        ##### Guarda variables de usuario,
        session([
            'rol'=>$roles,
            'locale'=>'es',
            'locale2'=>'spa',
        ]);

        $roles= CatRolesModel::all();

        $buzon= SistBuzonMensajesModel::where('buz_act','1')
            ->where(function($q){
                return $q
                ->where('buz_destino_usr',Auth::id())
                ->orWhereIn('buz_destino_rol',session('rol'));
            })
            ->orderBy('buz_date_origen','desc')
            ->get();

        return view('livewire.sistema.home-component',[
            'roles'=>$roles,
            'buzon'=>$buzon,
        ]);
    }
}
