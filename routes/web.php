<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\AutenticarController;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CursosController::class, 'lista_cursos_publico'])->name('template_public');

Route::get('/cursos_activos', [CursosController::class, 'Index'])->name('lista_cursos');
Route::get('/formulario_curso', [CursosController::class, 'FormularioRegistro']);
Route::post('/guardar_curso', [CursosController::class, 'RegistrarCursos'])->name('guardar_curso');
Route::put('/editar_curso/{id}', [CursosController::class, 'ActualizarCursos'])->name('editar_curso');
Route::put('/desactivar_curso/{id}', [CursosController::class, 'CambiarEstado'])->name('cambiar_estado');
// Route::get('/prueba', [CursosController::class, 'probar']);
Route::get('/login', function(){
    return view('login');
});

Route::get('/iniciar_sesion', [AutenticarController::class, 'IniciarSesion'])->name('iniciar_sesion');
Route::get('/cerrar_sesion', [AutenticarController::class, 'CerrarSesion'])->name('cerrar_sesion');
Route::get('/reporte_cursos', [PDFController::class, 'Index']);
Route::get('/categoria_cursos', [PDFController::class, 'cursos_categorias']);
Route::get('/reporte_categoria', [PDFController::class, 'ReporteCategoria'])->name('reporte_por_categoria');