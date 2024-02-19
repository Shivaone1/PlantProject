<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\productObjectController;
use App\Http\Controllers\uploadImageController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('register', [AuthController::class, 'register']);

Route::prefix('user')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('changePass', [AuthController::class, 'changePass']);
})->middleware('auth:api');

Route::post('productObject', [productObjectController::class, 'projectObjectdata']);
Route::post('uploadImage', [uploadImageController::class, 'uploadImage']);
Route::Post('getImage', [uploadImageController::class, 'getImage']);

Route::post('index', [PageController::class, 'index']);
Route::post('category', [PageController::class, 'getCategory']);
Route::post('plant', [PageController::class, 'getPlant']);

Route::prefix('product')->group(function () {
    Route::get('/list', [ProductController::class, 'index']);
    Route::post('/create', [ProductController::class, 'add']);
    Route::get('/view', [ProductController::class, 'view']);  // Use GET for retrieving a resource
    Route::post('/edit', [ProductController::class, 'edit']);
    Route::post('/search', [ProductController::class, 'search']);
})->middleware(['auth:api']);


// Route::post('/products/search/{keyword}', 'ProductController@searchProducts');
