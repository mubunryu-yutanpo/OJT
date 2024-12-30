<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\UserRegisterController;

// トップページ
Route::get('/', function () {return view('welcome');});

// 新規登録
Route::get('/register', [UserRegisterController::class, 'register'])->name('register');
Route::post('/register', [UserRegisterController::class, 'store'])->name('register.store');

// ログイン
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

//パスリセ
Route::get('/password-reset', [PasswordResetController::class, 'index'])->name('password_reset');

// 商品一覧
Route::get('/products', [ProductController::class, 'index'])->name('product.index');


Route::middleware(['auth'])->group(function () {
    // ログアウト
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // マイページ
    Route::get('/mypage', [MyPageController::class, 'index'])->name('my_page');

    // 商品関連
    Route::prefix('product')->name('product.')->group(function(){
        // 新規作成
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/create', [ProductController::class, 'store'])->name('store');
        // 編集
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [ProductController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
    });
});
