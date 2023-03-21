<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Gate;
// use Auth;

use App\Mail\UserEmail;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;

use App\Models\User;

use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;

Route::get('/', function () {
    // if (Gate::allows('test-gate', auth()->user())) {
    //     return "ok";
    // }
    $users = User::all();

    foreach ($users as $user) {
        // $user->notify(new UserNotification);
    Notification::send($user, new UserNotification);
    }
    return view('welcome');
});


Route::get('/sendmail', function (){
    Mail::to('bipudev@gmail.com')->queue(new UserEmail());
});

Route::group(['middleware' => ['auth', 'verified'] ], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::group(['middleware' => 'permission:author'], function(){
    Route::get('/testrole', function () {
        echo "Editor Page";
    })->name('testrole');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';


Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        Route::get('login', 'AuthenticatedSessionController@create')->name('login');
        Route::post('login', 'AuthenticatedSessionController@store')->name('loginattempt');
    });
    Route::post('logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');
    Route::middleware(['admin.auth'])->group(function(){
        Route::get('superdashboard', function(){
            return view('admin.dashbaord');
        })->name('dashboard');
    });
});
