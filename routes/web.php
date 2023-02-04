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
    // $user = User::UserAddId(8)
    // ->with(['address'])->get();

    // $data = UserAddress::with(['user' => function($q){
    //     $q->UserAdressId([10, 9, 7, 4]);
    // }])->get();

    $data = UserAddress::get();

    return $data->toArray();

    dd($data);
    return redirect();
});

Route::get('/c', function () {
    $c = null;
    return view('welcome', compact('c'));
})->name('home');


Route::resource('getd', PostController::class);