<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StorageController;

use App\Models\{
    Country, User, UserAddress
};

Route::get('/', function() {
    $user = User::with('image')->get();
    $country = Country::with('image')->get();

    // $data = UserAddress::with(['user' => function($q){
    //     $q->UserAdressId([10, 9, 7, 4]);
    // }])->get();

    //$data = UserAddress::get();

    //return $user->toArray();
    return $user;
    dd($user, $country);
});

Route::get('/c', function () {
    $c = null;
    return view('welcome', compact('c'));
})->name('home');


Route::resource('getd', PostController::class);