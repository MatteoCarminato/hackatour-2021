<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\MovimentacaoController;
use App\Http\Controllers\UserController;
use LaravelQRCode\Facades\QRCode;
use Illuminate\Http\Request;
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

Route::resource('empresa', EmpresaController::class)->middleware('auth');
Route::get('/qrcodeempresa/{id}', [EmpresaController::class, 'qrCodeEmpresa'])->name('QRCodeEmpresa')->middleware('auth');


Route::resource('user', UserController::class)->middleware('auth');

Route::get('/getcheckin', [MovimentacaoController::class, 'getCheckIn'])->name('getCheckIn')->middleware('auth');
Route::get('/getcheckout', [MovimentacaoController::class, 'getCheckOut'])->name('getCheckOut')->middleware('auth');
Route::get('/storecheckin/{codigo}', [MovimentacaoController::class, 'storeCheckIn'])->name('storeCheckIn')->middleware('auth');




Route::get('qr-code/{id}', function ($request) 
{
  $url = env('APP_URL').'storecheckin/'.$request;

  return QRCode::text($url)->png();    
})->name('code')->middleware('auth');;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.includes.dashboard');
})->name('dashboard');
