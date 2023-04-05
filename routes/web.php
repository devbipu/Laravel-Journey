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

use App\Http\Controllers\SslCommerzPaymentController;

Route::get('/', function () {
    // if (Gate::allows('test-gate', auth()->user())) {
    //     return "ok";
    // }
    $users = User::all();

    foreach ($users as $user) {
        // $user->notify(new UserNotification);
        Notification::send($user, new UserNotification($user));
    }
    return view('welcome');
});


Route::get('/sendmail', function (){
    Mail::to('bipudev@gmail.com')->queue(new UserEmail());
});

Route::group(['middleware' => ['auth', 'verified'] ], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/markasread/{id}', [DashboardController::class, 'markAsRead'])->name('markAsRead');
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


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
