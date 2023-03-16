<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
// use Auth;
use App\Http\Controllers\Api\{
    FileController, UserController
};




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function(){
    Route::post('/login', [UserController::class, 'onLogin']);




    Route::get('/getuser', [FileController::class, 'getData']);


    Route::get('/showuser/{user?}', [FileController::class, 'showUser'])->name('user.show');
    



    Route::put('/updateuser', [FileController::class, 'updateUser']);



    Route::post('/upload', [FileController::class, 'upload']);
});
