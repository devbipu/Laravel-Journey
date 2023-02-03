<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StorageController;

use Illuminate\Support\Facades\DB;

use App\Models\Country;

Route::get('/', function() {
    return redirect()->action([PostController::class, 'index']);
});

Route::get('/c/{id}', function (Country $id) {
    //$c = Country::find($id);
    return $id;
    return view('welcome', compact('c'));
})->name('home');


Route::resource('getd', PostController::class);