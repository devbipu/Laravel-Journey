<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\{
    User, Role
};


class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $rols = Role::where('slug', 'editor')->first();
        // return $rols;
        // dd($user->roles);
        // $user->roles()->attach($rols);
        return $user->roles;
        return view('dashboard');
    }
}
