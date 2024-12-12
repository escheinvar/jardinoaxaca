<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login\postController;
use App\Http\Controllers\login\loginController;
use App\Http\Controllers\login\logoutController;
use App\Livewire\Admin\Nuevousuario01Controller;
use App\Livewire\Admin\NuevoUsuarioController;
use App\Livewire\HistoriaController;
use App\Livewire\Login\RecuperaPasswd01Controller;
use App\Livewire\Login\RecuperaPasswdController;
use App\Livewire\Sistema\FichaClavoComponent;
use App\Livewire\Sistema\FichaEspecieComponent;
use App\Livewire\Sistema\FichaParadaCompenent;
use App\Livewire\Sistema\HomeComponent;
use App\Livewire\Sistema\MapaComponent;
use App\Livewire\Web\EventosController;
use App\Livewire\Web\InicioController;
use App\Livewire\Web\MapaController;
use App\Livewire\Web\RecorridosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" mi
ddleware group. Make something great!
|
*/


/* ------------------------------------ PÁGINA WEB PÚBLICA ------------------------ */
Route::get('/', InicioController::class)->name('inicio');
Route::get('/recorridos', RecorridosController::class)->name('recorridos');
Route::get('/mapa', MapaController::class)->name('mapa');
Route::get('/historia', HistoriaController::class)->name('historia');



Route::get('/servicios', function () {
    return view('web.Servicios');
});
Route::get('/directorio', function () {
    return view('web.Directorio');
});
Route::get('/colaboradores', function () {
    return view('web.Colaboradores');
});
Route::get('/educacion', function () {
    return view('web.Educacion');
});
// Route::get('/actividades2', function () {
//     return view('web.ActividadesBAC');
// });
Route::get('/actividades',EventosController::class)->name('actividades');

/* ---------------------------------------- LOGIN / LOGOUT ------------------------- */
Route::get('/ingreso',[loginController::class,'index'])->name('login');
Route::post('/ingreso',[loginController::class,'store']);

Route::post('/logout',[logoutController::class,'store'])->name('logout');

Route::get('/recuperaAcceso', RecuperaPasswdController::class);

Route::get('/recuperaContrasenia/{token}',RecuperaPasswd01Controller::class);

/* -------------------------- REGISTRO DE USUARIOS ----------------------------- */
Route::get('/nuevousr',NuevoUsuarioController::class)->name('nuevousr');
Route::get('/nuevousr01/{token}',Nuevousuario01Controller::class);


/* -------------------------- SECCIÓN AUTORIZADA ----------------------------- */
/* --------------------------------------------------------------------------- */
Route::middleware(['auth.basic'])->group(function(){
    Route::get('/home',HomeComponent::class)->name('home');
});

Route::get('/elmapa',MapaComponent::class)->name('elmapa');
Route::get('/laespecie',FichaEspecieComponent::class)->name('laespecie');
Route::get('/elclavo/{clavo}',FichaClavoComponent::class)->name('elclavo');
Route::get('/parada/{parada}',FichaParadaCompenent::class)->name('laparada');


