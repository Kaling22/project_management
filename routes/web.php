<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\auth_project;

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
    return view('login/login');
});

Route::post('actionlogin', [auth_project::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [auth_project::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::post('register', [auth_project::class, 'register'])->name('register');
Route::get('daftar', [auth_project::class, 'daftar'])->name('daftar');

Route::resource('dataProject', ProjectController::class);
