<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DeleteController;

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


/*ROTAS DE DELETE */
Route::delete('customers/{id}', [DeleteController::class, 'deleteCustomer']);


