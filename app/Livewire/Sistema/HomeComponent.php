<?php

namespace App\Livewire\Sistema;

use App\Models\CatRolesModel;
use Livewire\Component;
use Livewire\Attributes\Layout;


class HomeComponent extends Component
{
    public function render(){
        $roles= CatRolesModel::all();
        return view('livewire.sistema.home-component',[
            'roles'=>$roles,
        ]);
    }
}
