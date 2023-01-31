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
    $user = User::with('userCountry')->get();

    // $user = User::first();
    $country = Country::find(2);

    //Insert data into pivot table 1. Parent model 2. Relation 3. attach(data);
    // User::find(3)->userCountry()->attach([
    //     $country->id => [
    //         'status' => 0
    //     ]
    // ]); 
    return $user;
});

Route::get('/usersbycont', function(){
    $country = Country::with('users')->get();

    return $country;
});




// Route::get('getaddressbyuser', function(){
//     $user = UserAddress::with(['district', 'country', 'user'])->get();
//     return $user;
// });


// Route::get('getcountry', function(){
//     $country = Country::with('district')->get();
//     return $country;
// });

// Route::get('getdistrict', function(){
//     $district = District::find(1)->country;
//     return $district;
// });

