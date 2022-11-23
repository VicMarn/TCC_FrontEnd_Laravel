<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\AuthController;
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
Route::get('/',[MainController::class,'login']);

Route::get('menu',[MainController::class,'menu']);

Route::get('signup',[MainController::class,'signUp']);

Route::get('signupPJ',[MainController::class,'signupPJ']);

Route::get('customers',[MainController::class,'customers']);

Route::get('inspections',[MainController::class,'inspections']);

Route::get('newInspection',[MainController::class,'newInspection']);

Route::get('systemUsers',[MainController::class,'systemUsers']);

Route::get('aboutUs',[MainController::class,'aboutUs']);

Route::get('inspection/{id}', [MainController::class,'editInspection']);



/*ROTAS DE POST*/
Route::post('addCustomer', [PostController::class,'addCustomer']);
Route::post('addUser',[PostController::class,'addUser']);
Route::post('addInspection',[PostController::class,'addInspection']);
Route::post('/extinguisher/{id}',[PostController::class,'addExtinguisher']);

/*ROTAS DE DELETE */
Route::delete('customer/{id}',[DeleteController::class, 'deleteCustomer']);
Route::delete('user/{id}',[DeleteController::class,'deleteUser']);
Route::delete('inspection/{id}',[DeleteController::class,'deleteInspection']);
Route::delete('extinguisher/{id}',[DeleteController::class,'deleteExtinguisher']);

/*ROTAS DE PUT*/
Route::put('customer/{id}',[UpdateController::class,'putCustomer']);
Route::put('user/{id}',[UpdateController::class,'putUser']);

/*ROTAS DE AUTH*/
Route::post('/login2',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout']);
Route::post('/register',[AuthController::class,'register']);