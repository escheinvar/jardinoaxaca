<?php

namespace App\Livewire\Login;

use App\Models\User;
use Livewire\Component;
use App\Models\TokensModel;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\CssSelector\Parser\Token;

class RecuperaPasswd01Controller extends Component
{
    public $token, $caso, $contrasenia,$contraseniaConfirmacion, $mensaje;
    
    public function mount(string $token){
        $this->token=$token;
        $data=TokensModel::where('tok_token',$token)->where('tok_act','1')->where('tok_fin','>',now())->get();
        if($data->count() == '0'){
            $this->caso='0';
        }else{
            $this->caso='1';
        }
        $this->mensaje='';
    }

    public function Cambiar(){
        $this->validate([
            'contrasenia'=>'required',
            'contraseniaConfirmacion'=>'same:contrasenia',
        ]);
        $data=TokensModel::where('tok_token',$this->token)->where('tok_act','1')->where('tok_fin','>',now())->get();
        if($data->count() > '0'){
            $data=$data['0'];
            User::where('email',$data->tok_mail)->update([
                'password'=>Hash::make($this->contrasenia)
            ]);
            $this->mensaje='1';
            
            TokensModel::where('tok_mail',$data->tok_mail)->update([
                'tok_act'=>'0',
            ]);
        }else{
            $this->mensaje='2';;
        }

    }

    public function render(){
        return view('livewire.login.recupera-passwd01-controller');
    }
}
