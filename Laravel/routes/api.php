<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\productObjectController;
use App\Http\Controllers\uploadImageController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('productObject',[productObjectController::class,'projectObjectdata']);
Route::post('uploadImage',[uploadImageController::class,'uploadImage']);
Route::get('getImage',[uploadImageController::class,'getImage']);

Route::get('index',[PageController::class,'index']);
Route::get('category',[PageController::class,'getCategory']);
Route::get('plant',[PageController::class,'getPlant']);
Route::get('product',[PageController::class,'getProduct']);
Route::get('searchProducts',[ProductController::class,'searchProducts']);
// Route::get('/products/search/{keyword}', 'ProductController@searchProducts');
