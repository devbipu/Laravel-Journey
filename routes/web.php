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
    
    return $user->groupBy(function($item, $key){
        return $item['email']; substr($item['created_at'], 3, 3);
    });



    return $user->map(function($d) {
        if ($d->id == 2) {
            return false;
            //$d->email_verified_at = date('d-M-Y', time());
        }
        return $d->only('name', 'email');
    });


    // $data = UserAddress::with(['user' => function($q){
    //     $q->UserAdressId([10, 9, 7, 4]);
    // }])->get();

    //$data = UserAddress::get();

    //return $user->toArray();
    
    dd($user, $country);
});

Route::get('/c', function () {
    $c = null;
    return view('welcome', compact('c'));
})->name('home');


Route::resource('getd', PostController::class);