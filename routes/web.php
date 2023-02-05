<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StorageController;

use Illuminate\Support\Facades\DB;

use App\Models\{
    Country, User, UserAddress
};

Route::get('/', function() {
    $user = User::with('image')->get();
    $country = Country::with('image')->find(1);

    // $data = UserAddress::with(['user' => function($q){
    //     $q->UserAdressId([10, 9, 7, 4]);
    // }])->get();

    //$data = UserAddress::get();

    return $user->toArray();

    dd($data);
    return redirect();
});

Route::get('/c', function () {
    $c = null;
    return view('welcome', compact('c'));
})->name('home');


Route::resource('getd', PostController::class);