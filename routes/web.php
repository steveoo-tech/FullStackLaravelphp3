<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;

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

 //Auth::routes();


Route::get('/home', [HomeController::class, 'index']);
Route::get('/home/register',[HomeController::class, 'register']);
Route::get('/home/login',[HomeController::class, 'login']);
Route::post('/home/submitLogin',[HomeController::class, 'submitLogin']);
Route::post('/home/store', [HomeController::class, 'store']);
Route::get('/home/logout', [HomeController::class, 'logout']);
Route::get('/home/profile', [HomeController::class, 'profile'])->middleware('auth');;
Route::get('/home/secureArea', [HomeController::class, 'secureArea'])->middleware('auth');
Route::get('/home/adminArea', [HomeController::class, 'adminArea'])->middleware('auth');;
Route::get('/home/staffArea', [HomeController::class, 'staffArea'])->middleware('auth');;
// Route::get('/home/secureArea, 'HomeController@secureArea)->middleware('auth');
