<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Permission;

class PostController extends Controller
{
    public function index()
    {
        return view('backend.post.index');
    }


    public function create()
    {
        return view('backend.post.create');
    }

    public function edit()
    {   
        // $permissions = Permission::get();
        // if (Gate::allows('post-edit')) {
        // }
        
            return view('backend.post.edit');
        return redirect()->back()->with('message', "You don't have enaugh permission");
    }

    // public function delete()
    // {
    //     return view('backend.post.index');
    // }
}
