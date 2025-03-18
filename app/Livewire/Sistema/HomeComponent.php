<?php

namespace App\Livewire\Sistema;

use App\Models\CatRolesModel;
use App\Models\UserRolesModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('components.layouts.SistemaBase')]
class HomeComponent extends Component
{
    public function render(){
        #### Obtiene roles (por si saltó desde index a home)
        $roles=UserRolesModel::where('rol_act','1')->where('rol_usrid',Auth::id())->pluck('rol_crolrol')->toArray();

        ##### Guarda variables de usuario,
        session([
            'rol'=>$roles,
            'locale'=>'es',
            'locale2'=>'spa',
        ]);


        $roles= CatRolesModel::all();
        return view('livewire.sistema.home-component',[
            'roles'=>$roles,
        ]);
    }
}
