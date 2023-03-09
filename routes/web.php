<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::middleware(['auth', 'verified'])->prefix('dashboard')->name('admin.')->group(function(){

    Route::get('users', [UserController::class, 'userShow'])->name('users.show');
    Route::get('role', [UserController::class, 'userRoleShow'])->name('users.roleShow');
    Route::get('permissions', [UserController::class, 'userPermissionShow'])->name('users.permissionShow');

    Route::name('post.')->group(function(){
        Route::get('posts', [PostController::class, 'index'])->name('show');
        Route::get('posts/edit', [PostController::class, 'edit'])->name('edit');
        Route::get('posts/create', [PostController::class, 'create'])->name('create');
    });
});