<?php

namespace App\Http\Middleware;

use App\Models\UserRolesModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UsuarioLogeadoConRolMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{

        if(Auth::user()) {
            $roles=UserRolesModel::where('rol_act','1')->where('rol_usrid',Auth::id())->pluck('rol_crolrol')->toArray();

            ##### Guarda variables de usuario,
            session([
                'rol'=>$roles,
                #'locale'=>'es',
                #'locale2'=>'spa',
            ]);
            return $next($request);
        }else{
            #### Redirecciona
            return redirect()->route('login');
        }

    }
}
