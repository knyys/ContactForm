<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;


//ログイン処理
Route::post('/login',[LoginController::class,'login']);
//ログアウト処理
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

//管理画面
    //画面表示
    Route::get('/admin', [AdminController::class, 'index']);
    //削除
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('contacts.destroy');
    //検索
    Route::get('/search', [AdminController::class, 'search']); 

//お問い合わせフォーム
    //表示
    Route::get('/',[ContactController::class,'index']);
    //入力処理
    Route::post('/',[ContactController::class,'confirm']);
    //確認画面
    Route::get('/confirm',[ContactController::class,'confirmForm']);
    //送信
    Route::post('/confirm',[ContactController::class,'send']);
    //サンクスページ
    Route::get('/thanks',[ContactController::class,'thanks']);
