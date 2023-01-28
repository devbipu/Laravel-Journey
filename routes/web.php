<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
})->name('home');


Route::prefix('frontend')->name('front.')->group(function(){
    Route::get('/about/{id}/profile', function (Request $request, $id) {
        return view('about', compact('id'));
    })->name('about');


    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

});

