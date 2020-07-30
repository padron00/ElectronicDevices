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

Route::get('/admin/', function () {
    return view('welcomeAdmin');
});


//Cameras

Route::get('/cameras', 'CameraController@CameraStore')->name('CameraStore');

Route::get('/cameras/{id}', 'CameraController@Details')->name('CameraDetails');

Route::post('/cameras/comment', 'CameraController@AddComment')->name('CamerasComments');

//Admin.Cameras

Route::get('/admin/cameras', 'CameraController@Index');

Route::get('/admin/cameras/create', "CameraController@Create");

Route::post('/admin/cameras/create', "CameraController@Store");

Route::get('/admin/cameras/delete/{id}', "CameraController@Delete");

Route::get('/admin/cameras/edit/{id}', "CameraController@Edit");

Route::get('/admin/cameras/{id}', "CameraController@Show");

Route::post('/admin/cameras/edit', "CameraController@Update");

Route::delete('/admin/cameras/delete', "CameraController@Remove");


// GPUs

Route::get('/gpus', 'GPUController@GPUStore')->name('GPUStore');

Route::get('/gpus/{id}', 'GPUController@Details')->name('GPUDetails');

Route::post('/gpus/comment', 'GPUController@AddComment')->name('GPUsComments');

// Admin.GPUs

Route::get('/admin/gpus', 'GPUController@Index');

Route::get('/admin/gpus/create', "GPUController@Create");

Route::post('/admin/gpus/create', "GPUController@Store");

Route::get('/admin/gpus/delete/{id}', "GPUController@Delete");

Route::get('/admin/gpus/edit/{id}', "GPUController@Edit");

Route::get('/admin/gpus/{id}', "GPUController@Show");

Route::post('/admin/gpus/edit', "GPUController@Update");

Route::delete('/admin/gpus/delete', "GPUController@Remove");


// Laptops

Route::get('/laptops', 'LaptopController@LaptopStore')->name('LaptopStore');

Route::get('/laptops/{id}', 'LaptopController@Details')->name('LaptopDetails');

Route::post('/laptops/comment', 'LaptopController@AddComment')->name('LaptopsComments');

// Admin.Laptops

Route::get('/admin/laptops', 'LaptopController@Index');

Route::get('/admin/laptops/create', "LaptopController@Create");

Route::post('/admin/laptops/create', "LaptopController@Store");

Route::get('/admin/laptops/delete/{id}', "LaptopController@Delete");

Route::get('/admin/laptops/edit/{id}', "LaptopController@Edit");

Route::get('/admin/laptops/{id}', "LaptopController@Show");

Route::post('/admin/laptops/edit', "LaptopController@Update");

Route::delete('/admin/laptops/delete', "LaptopController@Remove");


// Smartphones

Route::get('/smartphones', 'SmartphoneController@SmartphoneStore')->name('SmartphoneStore');

Route::get('/smartphones/{id}', 'SmartphoneController@Details')->name('SmartphoneDetails');

Route::post('/smartphones/comment', 'SmartphoneController@AddComment')->name('SmartphonesComments');

// Admin.Smartphones

Route::get('/admin/smartphones', 'SmartphoneController@Index');

Route::get('/admin/smartphones/create', "SmartphoneController@Create");

Route::post('/admin/smartphones/create', "SmartphoneController@Store");

Route::get('/admin/smartphones/delete/{id}', "SmartphoneController@Delete");

Route::get('/admin/smartphones/edit/{id}', "SmartphoneController@Edit");

Route::get('/admin/smartphones/{id}', "SmartphoneController@Show");

Route::post('/admin/smartphones/edit', "SmartphoneController@Update");

Route::delete('/admin/smartphones/delete', "SmartphoneController@Remove");


Route::get('/mongodb', function () {
    return view('mongodb');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

