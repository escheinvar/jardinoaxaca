<?php

namespace App\Http\Middleware;

use App\Models\SpUrlCedulaModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EditaCedulas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        ##### obtiene id de la cédula (desde url)
        $cedID=$request->route()->parameter('cedID');

        ##### Obtiene permisos del usuario
        $PermisoCedulas=['todas','JebOax'];
        $PermisoTraduce=['jardin'=>['lengua']];

        ##### obtiene jardín y lengua de la cédula
        $CedulaJardin=SpUrlCedulaModel::where('ced_act','1')
            ->where('ced_id',$cedID)
            ->value('ced_cjarsiglas');

        $CedulaLengua=SpUrlCedulaModel::where('ced_act','1')->where('ced_id',$cedID)->value('ced_clencode');

        return $next($request);
    }
}
