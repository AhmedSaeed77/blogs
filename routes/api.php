<?php 
 use App\Http\Controllers\Api\RoomController; 
 
 use App\Http\Controllers\Api\CountryController; 


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {return "test";})->name('test');




Route::group(['prefix' => 'countries'], function () {
    Route::get('/findAll', [CountryController::class, 'findAll']);
    Route::get('/{id}', [CountryController::class, 'find']);
    Route::post('/', [CountryController::class, 'store']);
    Route::put('/{country}', [CountryController::class, 'update']);
    Route::delete('/{country}', [CountryController::class, 'delete']);
});

Route::group(['prefix' => 'rooms'], function () {
    Route::get('/findAll', [RoomController::class, 'findAll']);
    Route::get('/{id}', [RoomController::class, 'find']);
    Route::post('/', [RoomController::class, 'store']);
    Route::put('/{room}', [RoomController::class, 'update']);
    Route::delete('/{room}', [RoomController::class, 'delete']);
});
