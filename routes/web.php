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
    return view('welcome');
});

 //Auth::routes(['verify' => true]);

//Route::get('/' , [App\Http\Controllers\Auth\LoginController::class , 'showLoginForm']);


Route::group(['prefix'=>'admin'], function () {
        Route::group(['middleware'=>'admin.guest'], function () {
        Route::view('login', 'admin.login')->name('admin.login');
        Route::post('login', [App\Http\Controllers\AdminController::class,'login'])->name('admin.auth'); });

        Route::group(['middleware'=>'admin.auth'], function () {
       
        Route::post('logout', [App\Http\Controllers\AdminController::class,'logout'])->name('admin.logout');
        Route::resource('/apk', 'ApkController');
        Route::resource('/product', 'ProductController');
        Route::view('dashboard', 'admin.home')->name('admin.home');
        Route::post('/add-to-cart', [App\Http\Controllers\ProductController::class, 'addtocart']);
        Route::get('/load-cart-data',[App\Http\Controllers\ProductController::class, 'cartloadbyajax']);
        Route::get('/cart',[App\Http\Controllers\ProductController::class,'cart']);
        Route::post('update-to-cart',[App\Http\Controllers\ProductController::class, 'updatetocart']);
        Route::delete('delete-from-cart',[App\Http\Controllers\ProductController::class,'deletefromcart']);
        Route::get('clear-cart',[App\Http\Controllers\ProductController::class,'clearcart']);
        Route::get('/apk', [App\Http\Controllers\ApkController::class, 'Show_allapk'])->name('showall.apk');
      });
});


// Route::group(['prefix'=>'editor'], function () {
//     Route::group(['middleware'=>'editor.guest'], function () {
//         Route::view('login', 'editor.login')->name('editor.login');
//         Route::post('login', [App\Http\Controllers\EditorController::class,'login'])->name('editor.auth'); });

//     Route::group(['middleware'=>'editor.auth'], function () {
//     Route::view('editoring', 'editor.home')->name('admin.home');
//     });
// });

// Route::namespace("editor")->prefix('editor')->group(function(){
// 	//Route::get('/', [App\Http\Controllers\ApkController::class,'index'])->name('editor.home');
// 	Route::namespace('Auth')->group(function(){
// 		//Route::get('/login', 'LoginController@showLoginForm')->name('editor.login');
//         Route::view('login', 'editor.login')->name('editor.login');

// 		//Route::post('/login', 'LoginController@login');
// 		//Route::post('logout', 'LoginController@logout')->name('editor.logout');
// 	});
// });




 //Route::get('/', [App\Http\Controllers\ApkController::class, 'apk_index']);
//Route::Put('/apk/increment_count/{id}', [App\Http\Controllers\ApkController::class, 'increment_count'])->name('apk.countstoreCount');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
