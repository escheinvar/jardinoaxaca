<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\TokensModel;
use App\Models\InstitucionesModel;
use App\Models\UserRolesModel;
use Illuminate\Support\Facades\Hash;

class Nuevousuario01Controller extends Component
{
    public $token,$correo,$nombre,$apellido,$usrname,$nace;
    public $org,$contrasenia,$contrasenia2;


    public function mount(string $token){
        $this->token = $token;
        $this->correo=TokensModel::where('tok_token',$token)->where('tok_act','1')->where('tok_fin','>',now() )->pluck('tok_mail');
        $this->org='0';

    }

    public function enviar(){
        ##### Valida cuestionario
        $this->validate([
            'correo'=>'required',
            'nombre'=>'required',
            'apellido'=>'required',
            'usrname'=>'required|unique:users,usrname',
            'contrasenia'=>'required',
            'contrasenia2'=>'required|same:contrasenia',
        ]);

        ##### Genera registro de usuario
        $ja=User::firstOrCreate(['email'=>$this->correo],[
            'email'=>$this->correo[0],
            'usrname'=>$this->usrname,
            'nombre'=>$this->nombre,
            'apellido'=>$this->apellido,
            'nace'=>$this->nace,
            'org'=>$this->org,
            'logo'=>null,
            'password'=>Hash::make($this->contrasenia),

        ]);

        
        ##### Otorga rol básico
        UserRolesModel::firstOrCreate(['rol_usrid'=>$ja->id,'rol_crolid'=>'2'],[
            'rol_usrid'=>$ja->id,
            'rol_crolid'=>'2',
            'rol_describe'=>'base:usr',
        ]);

        return redirect('/ingreso');
    }

    public function render(){
        $instituciones=InstitucionesModel::all();
        return view('livewire.admin.nuevousuario01-controller',[
            'instituciones'=>$instituciones,
        ]);
    }
}
