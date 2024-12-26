<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;

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

Route::get('/', [SiteController::class, 'home']);

Route::get('/login', [SiteController::class, 'loginForm'])->name('login');
Route::post('/login',[SiteController::class, 'login']);
Route::post('/register',[SiteController::class, 'register']);
Route::get('/register',[SiteController::class, 'registerForm']);

Route::group(['middleware'=>'auth'], function(){

    Route::post('/logout', [SiteController::class, 'logout']);

    Route::get('/users/create',[UserController::class,'create']);
    Route::post('/users',[UserController::class, 'store']);
    Route::get('/users', [UserController::class,'index']);

    Route::get('/patients/create', [PatientController::class,'create']);
    Route::get('/patients/edit/{id}', [PatientController::class,'edit']);
    Route::get('/patients/delete/{id}', [PatientController::class,'delete']);
    Route::get('/patients/view/{id}', [PatientController::class,'view']);
    Route::delete('/patients/{patient}', [PatientController::class,'destroy']);
    Route::put('/patients/{patient}', [PatientController::class,'update']);
    Route::get('/patients', [PatientController::class,'index']);
    Route::post('/patients', [PatientController::class,'store']);

    Route::get('/rooms/create', [RoomController::class,'create']);
    Route::get('/rooms/edit/{id}', [RoomController::class,'edit']);
    Route::put('/rooms/{room}', [RoomController::class,'update']);
    Route::get('/rooms/delete/{id}', [RoomController::class,'delete']);
    Route::delete('/rooms/{room}', [RoomController::class,'destroy']);
    Route::get('/rooms', [RoomController::class,'index']);
    Route::post('/rooms', [RoomController::class,'store']);
});


