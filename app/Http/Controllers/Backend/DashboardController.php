<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\{
    User, Role, Permission
};


class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();

        return view('dashboard');
    }
}
