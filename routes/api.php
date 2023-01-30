<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StorageController;


use App\Models\Country;
use App\Models\District;
use App\Models\User;
use App\Models\UserAddress;

/*
|--------------------------------------------------------------------------|
| API Routes
|--------------------------------------------------------------------------|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('upf', [StorageController::class, 'fileStore']);


Route::get('getuser', function(){
    $user = User::with('country')->get();
    return $user;
});

Route::get('getaddressbyuser', function(){
    $user = UserAddress::with(['district', 'country', 'user'])->get();
    return $user;
});


Route::get('getcountry', function(){
    $contry = Country::with('district')->get();
    return $contry;
});

Route::get('getdistrict', function(){
    $district = District::find(1)->country;
    return $district;
});

