<?php

use App\Http\Controllers\Api\Login\LoginController;
use App\Http\Controllers\Api\Menu\MenuController;
use App\Http\Controllers\Api\questions\QuestionsController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your appphp arlication. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [LoginController::class, 'login']);
Route::prefix('app')->group(function () {
    Route::post('register', [LoginController::class, 'register']);
    Route::get('register', [LoginController::class, 'getDataRegister']);

});


Route::get('storage/app/{path}/{filepath}', [Controller::class, 'show']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', [LoginController::class, 'logout']);

});

Route::get('menu', [MenuController::class, 'getMenu']);
Route::prefix('questions')->group(function () {
    Route::get('/', [QuestionsController::class, 'getQuestions']);

});
