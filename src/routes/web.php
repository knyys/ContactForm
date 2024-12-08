<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
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

Route::get('/',[TestController::class,'index']);

Route::post('/confirm',[TestController::class,'confirm']);

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/search', [AdminController::class, 'search']); 

Route::post('/admin',[TestController::class,'admin']);

Route::delete('/admin/search', [TodoController::class, 'destroy']);

Route::get('/login',[TestController::class,'login']);

Route::post('/login',[TestController::class,'authenticate']);

Route::get('/register',[TestController::class,'registerForm']);

Route::post('/register',[TestController::class,'register']);

Route::post('/thanks',[TestController::class,'thanks']);
