<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRolesModel;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){
        if(auth()->user()){
            return redirect('home');
        }else{
            return view('login/login',['mensaje'=>'',]);
        }
    }

    public function store(Request $request){

        $request->session()->regenerate();
        ##### Valida cuestionario
        $this->validate($request,[
            'correo'=>'required',
            'contrasenia'=> 'required',
        ]);

        $credentials = [
            'email' => $request->correo,
            'password' => $request->contrasenia,
        ];
        $remember= $request->dejarActiva;

        ##### Autentica contra directorio activo
        if(Auth::attempt($credentials, $remember)) {
            $roles=UserRolesModel::where('rol_act','1')->where('rol_usrid',auth()->user()->id)->pluck('rol_crolid')->toArray();
            #$roles2=implode(',',$roles);

            ##### Guarda variables de usuario,
            session([
                'rol'=>$roles,
                'locale'=>'es',
                'localeid'=>'2',
            ]);



            #### Redirecciona
            return redirect('/home');

        }else{
            return view('login/login',['mensaje'=>'Credenciales erróneas']);

        }
        return view('login/login',['mensaje'=>'Error']);

    }
}
