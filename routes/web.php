<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarPhotoController;

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
/*
Route::get('/', function () {
    return view('home');
})->name('home');
*/

Route::get('/',[CarBrandController::class,'index'])->name('home');

Route::get('/brand/create',[CarBrandController::class,'createBrand'])->name('add_brand');

Route::post('/brand/create',[CarBrandController::class,'createBrandSubmit'])->name('brand_submit');

Route::get('/brand/{id}',[CarBrandController::class,'show'])->name('car-brand');

Route::get('/{id}/model/create',[CarModelController::class,'createModel'])->name('add-model');

Route::post('/model/create',[CarModelController::class,'createModelSubmit'])->name('model-submit');

Route::get('/model/{id}',[CarModelController::class,'show'])->name('car-model');

Route::get('/model/{id}/car/create',[CarController::class,'createCar'])->name('add-car');

Route::post('/model/car/create',[CarController::class,'createCarSubmit'])->name('car-submit');

Route::get('/car/{id}/details',[CarController::class,'show'])->name('car-details');

Route::get('/car/{id}/photogallery/create',[CarPhotoController::class,'createPhoto'])->name('add-photo');

Route::post('/car/photogallery/create',[CarPhotoController::class,'createPhotoSubmit'])->name('photo-submit');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');;
