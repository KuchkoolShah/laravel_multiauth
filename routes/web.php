<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});


Auth::routes();
//Route::get('/' , [App\Http\Controllers\Auth\LoginController::class , 'showLoginForm']);

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin'], function () {
    
    Route::group(['middleware'=>'admin.guest'], function () {
        Route::view('login', 'admin.login')->name('admin.login');
        Route::post('login', [App\Http\Controllers\AdminController::class,'login'])->name('admin.auth');

    });

    Route::group(['middleware'=>'admin.auth'], function () {
        Route::view('dashboard', 'admin.home')->name('admin.home');
        Route::post('logout', [App\Http\Controllers\AdminController::class,'logout'])->name('admin.logout');
        Route::resource('/apk', 'ApkController');
        Route::get('/apk', [App\Http\Controllers\ApkController::class, 'Show_allapk'])->name('showall.apk');
        Route::get('/form/{id}', [App\Http\Controllers\ApkController::class, 'increment_form'])->name('apk.imcrement');
        Route::post('/apk/increment/{id}', [App\Http\Controllers\ApkController::class, 'increment'])->name('apk.countstore');
        Route::get('/search/', [App\Http\Controllers\ApkController::class,'search'])->name('search');
        Route::resource('/student','Admin\StudentController');

    });
});




 //Route::get('/', [App\Http\Controllers\ApkController::class, 'apk_index']);
Route::Put('/apk/increment_count/{id}', [App\Http\Controllers\ApkController::class, 'increment_count'])->name('apk.countstoreCount');
