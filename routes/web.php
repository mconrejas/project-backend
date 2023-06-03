<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('User');
});

Route::get('about', [UserController::class, 'show']);


Route::controller(UserController::class)->name('User.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('{id}', 'show')->name('show');
    Route::post('', 'store')->name('store');
    Route::put('{id}', 'update')->name('update');
    Route::delete('{id}', 'delete')->name('delete');
    
});

