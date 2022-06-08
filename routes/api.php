<?php

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* MUESTRA TODOS LOS REQUEST DE CONTACTO ENVIADOS */
Route::get('AllContacts',[ContactController::class,'index']);

/* REGISTRA EL REQUEST DE CONTACTO */
Route::post('RegisterContact',[ContactController::class,'store']);

/* MUESTRA UN REQUEST PUNTUAL CORRESPONDIENTE AL MAIL E ID */
Route::get('SpecificContact/{$id}',[ContactController::class,'show']);