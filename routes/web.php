<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\UserController;
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
    return view('BackEnd.Dashboard.home');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Route::group(['middleware' => 'auth'], function(){
// 	Route::prefix('users')->group(function(){
// 	Route::get('/view', 'Backend\UserController@view')->name('users.view');
// 	Route::get('/add', 'Backend\UserController@add')->name('users.add');
// 	Route::post('/store', 'Backend\UserController@store')->name('users.store');
// 	Route::get('/edit/{id}', 'Backend\UserController@edit')->name('users.edit');
// 	Route::post('/update/{id}', 'Backend\UserController@update')->name('users.update');
// 	Route::get('/delete/{id}', 'Backend\UserController@delete')->name('users.delete');
// });


Route::group(['middleware' => 'auth'], function(){
    Route::prefix('user')->group(function(){
        Route::get('/view',[UserController::class,'view'])->name('user.view');
        Route::post('/add',[UserController::class,'store'])->name('user.add');
        Route::get('/fetch/user',[UserController::class,'fetch_user'])->name('user.fetch');
        Route::get('/edit',[UserController::class,'edit_user'])->name('user.edit');
        Route::put('/update',[UserController::class,'update_user'])->name('user.update');
        
    });
});


require __DIR__.'/auth.php';
