<?php

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


Route::post('register', 'Admin\UserAuthController@register');
Route::post('login', 'Admin\UserAuthController@login');
Route::post('/send-reset-password-email', 'Admin\UserAuthController@send_reset_password_email');
Route::post('/reset-password/{token}', 'Admin\UserAuthController@reset');
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => ['auth:api']], function() {
     Route::get('/loggeduser', 'Admin\UserAuthController@logged_user');
     Route::post('/logout', 'Admin\UserAuthController@logout');
     Route::post('/changepassword', 'Admin\UserAuthController@change_password');

    Route::resource('apk','ApkController');
});

// Route::middleware(['auth:sanctum'])->group(function(){
// });



// Route::Put('/apk/increment_count/{id}', [App\Http\Controllers\ApkController::class, 'increment_count'])->name('apk.countstoreCount');



