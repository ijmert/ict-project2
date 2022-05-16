<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorController;
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

Route::post('/showEditSensor', [App\Http\Controllers\sensorController::class, 'showEditSensor']); //view edit tonen
Route::post('/editSensor', [App\Http\Controllers\sensorController::class, 'editSensor']);         //sensor Aanpassen
Route::get('/showEditSensor', [App\Http\Controllers\sensorController::class, 'showEditSensor']);  //wanneer fout


Route::post('/showAddSensor', [App\Http\Controllers\sensorController::class, 'showAddSensor']); //view add tonen
Route::post('/addSensor', [App\Http\Controllers\sensorController::class, 'addSensor']);         //sensor Aanpassen
Route::get('/showAddSensor', [App\Http\Controllers\sensorController::class, 'showAddSensor']);  //wanneer fout
//Route::post('/showAddSensor', [App\Http\Controllers\sensorController::class, 'showAddSensor']);
/*Route::post('showAddSensor', 'App\Http\Controllers\sensorController@showAddSensor');
Route::get('addSensor', 'App\Http\Controllers\sensorController@addSensor');
Route::post('addSensor', 'App\Http\Controllers\sensorController@addSensor'); */


Route::get('/home', [App\Http\Controllers\sensorController::class, 'mainSiteConfig']);


Route::post('/deleteSensor', [App\Http\Controllers\sensorController::class, 'deleteSensor']);
Route::get('/deleteSensor', [App\Http\Controllers\sensorController::class, 'deleteSensor']);

Route::get('/showEditAccount', [App\Http\Controllers\EditAccountController::class, 'mainSiteConfig'])->name('showEditAccount');;
Route::post('/editAccount', [App\Http\Controllers\EditAccountController::class, 'editAccount']);
Route::post('/showEditAccount', [App\Http\Controllers\EditAccountController::class, 'mainSiteConfig']);

Route::post('/test', [App\Http\Controllers\EditAccountController::class,'DeleteUser']);

Route::post('/deleteSensor', [App\Http\Controllers\sensorController::class, 'deleteSensor']);
Route::get('/deleteSensor', [App\Http\Controllers\sensorController::class, 'deleteSensor']);






