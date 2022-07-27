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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('carcasa', [App\Http\Controllers\HomeController::class, 'carcasa'])->name('carcasa');

Route::controller(MontosController::class)->group(function () {
    Route::get('montos', 'index')->name('montos')->middleware('auth');
    Route::post('montos', 'store')->name('montos.store')->middleware('auth');
    Route::get('nuevo_monto', 'nmonto')->name('nmontos')->middleware('auth');
    Route::get('nuevo_monto/{id}', 'activateMonto')->name('monto.update')->middleware('auth');
});

Route::controller(ComercianteController::class)->group(function() {
    Route::get('registrarComerciante', 'index')->name('rComerciantes')->middleware('auth');
    Route::post('guardarComerciante', 'saveMerchant')->name('gComerciantes')->middleware('auth');
    Route::get('registrarLocal/{rfc}', 'registerLocal')->name('rLocal')->middleware('auth');
    Route::post('registrarComercianteLocal/{rfc}', 'saveMerchantLocal')->name('sMLocal')->middleware('auth');
    Route::get('listaComerciante', 'listMerchant')->name('lComerciantes')->middleware('auth');
    
});

Route::controller(TianguisContoller::class)->group(function() {
    Route::get('listaTuianguis', 'index')->name('lTianguis')->middleware('auth');
    Route::get('nuevo_tianguis', 'nTianguis')->name('nTianguis')->middleware('auth');
    Route::post('ntianguis', 'store')->name('tianguis.store')->middleware('auth');
});

Route::controller(LocalesController::class)->group(function() {
    Route::get('listaLocales', 'index')->name('lLocales')->middleware('auth');
    Route::get('nuevoLocalT', 'nuevoLocalT')->name('nLocalT')->middleware('auth');
    Route::get('nuevoLocalA', 'nuevoLocalA')->name('nLocalA')->middleware('auth');
    Route::post('guardarLocal/', 'saveLocal')->name('sLocal')->middleware('auth');
});

Route::controller(PagosController::class)->group(function() {
    Route::get('listaPagos', 'index')->name('payment.list')->middleware('auth');
    Route::get('nuevoPago/{rfc}/{registro}', 'newPayment')->name('payment.new')->middleware('auth');
    Route::post('guardarPago', 'savePayment')->name('payment.save')->middleware('auth');
    Route::get('localesPago/{rfc}', 'localsPayment')->name('payment.locals')->middleware('auth');
    Route::get('ListaPagosPendientes', 'pendingPayments')->name('payments.pending')->middleware('auth');
    //Route::get('nuevoAdeudoPago/{rfc}', 'newDuePayment')->name('payment.due')->middleware('auth');
    
    Route::get('downloadPDF/{id}','downloadPDF')->name('payments.dwnlpdf')->middleware('auth');
});

Route::controller(InspectoresController::class)->group(function(){
    Route::get('inspectores', 'index')->name('inspectores')->middleware('auth');
    Route::get('nInspector', 'nInspector')->name('inspector.new')->middleware('auth');
    Route::post('sInspector', 'saveInspector')->name('inspector.store')->middleware('auth');
});

Route::controller(PasswordController::class)->group(function() {
    Route::get('cambiarContrasena', 'index')->name('cambiarContrasena')->middleware('auth');
    Route::post('guardarContrasena', 'changePass')->name('guardarContrasena')->middleware('auth');
});