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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/showEditSensor', [App\Http\Controllers\sensorController::class, 'showEditSensor'])->name('editSensor');
Route::get('/editSensor', [App\Http\Controllers\sensorController::class, 'showEditSensor'])->name('editSensor');
Route::post('/editSensor', [App\Http\Controllers\sensorController::class, 'editSensor'])->name('editSensor');

Route::get('/home', [App\Http\Controllers\sensorController::class, 'mainSiteConfig'])->name('test');
//Route::post('/home', [App\Http\Controllers\sensorController::class, 'mainSiteConfigButtons'])->name('test');

Route::post('/addSensor', [App\Http\Controllers\sensorController::class, 'showEditSensor'])->name('addSensor');
Route::post('/deleteSensor', [App\Http\Controllers\sensorController::class, 'deleteSensor'])->name('deleteSensor');
Route::get('/deleteSensor', [App\Http\Controllers\sensorController::class, 'deleteSensor'])->name('deleteSensor');





