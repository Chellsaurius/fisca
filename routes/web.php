<?php

use App\Http\Controllers\ComercianteController;
use App\Http\Controllers\InspectoresController;
use App\Http\Controllers\LocalesController;
use App\Http\Controllers\MontosController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TianguisContoller;
use Illuminate\Support\Facades\Route;
use Mockery\Generator\StringManipulation\Pass\Pass;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('carcasa', [App\Http\Controllers\HomeController::class, 'carcasa'])->name('carcasa');

Route::controller(MontosController::class)->group(function () {
    Route::get('montos', 'index')->name('montos');
    Route::post('montos', 'store')->name('montos.store');
    Route::get('nuevo_monto', 'nmonto')->name('nmontos');
});

Route::controller(ComercianteController::class)->group(function() {
    Route::get('registrarComerciante', 'index')->name('rComerciantes');
    Route::post('guardarComerciante', 'saveMerchant')->name('gComerciantes');
    Route::get('registrarLocal/{rfc}', 'registerLocal')->name('rLocal');
    Route::post('registrarComercianteLocal/{rfc}', 'saveMerchantLocal')->name('sMLocal');
    Route::get('listaComerciante', 'listMerchant')->name('lComerciantes');
    
});

Route::controller(TianguisContoller::class)->group(function() {
    Route::get('listaTuianguis', 'index')->name('lTianguis');
    Route::get('nuevo_tianguis', 'nTianguis')->name('nTianguis');
    Route::post('ntianguis', 'store')->name('tianguis.store');
});

Route::controller(LocalesController::class)->group(function() {
    Route::get('listaLocales', 'index')->name('lLocales');
    Route::get('nuevoLocalT', 'nuevoLocalT')->name('nLocalT');
    Route::get('nuevoLocalA', 'nuevoLocalA')->name('nLocalA');
    Route::post('guardarLocal/', 'saveLocal')->name('sLocal');
});

Route::controller(PagosController::class)->group(function() {
    Route::get('listaPagos', 'index')->name('payment.list');
    Route::get('nuevoPago/{rfc}/{registro}', 'newPayment')->name('payment.new');
    
});

Route::controller(InspectoresController::class)->group(function(){
    Route::get('inspectores', 'index')->name('inspectores');
    Route::get('nInspector', 'nInspector')->name('inspector.new');
    Route::post('sInspector', 'saveInspector')->name('inspector.store');
});

Route::controller(PasswordController::class)->group(function() {
    Route::get('cambiarContrasena', 'index')->name('cambiarContrasena');
    Route::post('guardarContrasena', 'changePass')->name('guardarContrasena');
});