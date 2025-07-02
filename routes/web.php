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

// Route::get('/', function () {
//     return view('welcome');
// });

/********************* Turbines ***********************************************/

Route::get('/', [TurbineController::class, 'index'])->name('turbines.index');
Route::get('/turbine/{turbine}', [TurbineController::class, 'show'])->name('turbines.show');

/********************* Inspector ***********************************************/

Route::get('/inspector/login', [InspectorController::class, 'show'])->name('inspector.show');
Route::post('/inspector/login', [InspectorController::class, 'login'])->name('inspector.login');
Route::post('/inspector/logout', [InspectorController::class, 'logout'])->name('inspector.logout');