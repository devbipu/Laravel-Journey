<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StorageController;

use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    // $d = DB::table('actor')->where(function($q){
    //     $q->where('first_name', 'JENNIFER');
    //     $q->orWhere('last_name', 'Davis');
    // })
    // ->get();

    // $d = DB::table('address')->select(['district', DB::raw('COUNT(district) as `count`')])
    // ->groupBy('district')
    // ->orderBy('count', 'desc')
    // ->get();
    /*

    SELECT *, COUNT(*) as `district_cont` FROM `address`
GROUP BY `district`
ORDER BY district ASC

    */


    $d = DB::table("staff")
    ->leftJoin('address as addr', 'staff.address_id', '=', 'addr.address_id')
    ->select(['staff.*', 'addr.address_id', 'addr.address'])
    ->get();
    // $encoded = json_encode( utf8ize( $d ) );
    dd($d);
    return $encoded;
})->name('home');
