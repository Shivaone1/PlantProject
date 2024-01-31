<?php

use App\Http\Controllers\articleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\uploadImageController;
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
Route::get('/image-upload-form', [uploadImageController::class, 'showImageForm']);
Route::post('/upload-image', [uploadImageController::class, 'uploadImage'])->name('upload.image');

Route::get('/articles',[articleController::class,'index']);