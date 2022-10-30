<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\UpdateController;
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

/*ROTAS DE GET*/
Route::get('/',[MainController::class,'menu']);

Route::get('login',[MainController::class,'login']);

Route::get('signup',[MainController::class,'signUp']);

Route::get('customers',[MainController::class,'customers']);

Route::get('inspections',[MainController::class,'inspections']);

Route::get('newInspection',[MainController::class,'newInspection']);

Route::get('systemUsers',[MainController::class,'systemUsers']);

Route::get('aboutUs',[MainController::class,'aboutUs']);


/*ROTAS DE POST*/
Route::post('addCustomer', [PostController::class,'addCustomer']);
Route::post('addUser',[PostController::class,'addUser']);

/*ROTAS DE DELETE */
Route::delete('customer/{id}', [DeleteController::class, 'deleteCustomer']);
Route::delete('user/{id}',[DeleteController::class,'deleteUser']);

/*ROTAS DE PUT*/
Route::put('customer/{id}',[UpdateController::class,'putCustomer']);
Route::put('user/{id}',[UpdateController::class,'putUser']);