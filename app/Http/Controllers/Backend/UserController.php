<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Role, Permission};

class UserController extends Controller
{
    public function userShow()
    {
        $users = User::with('role')->paginate(10);
        // $roles = Role::pluck('id')->toArray();
        // return $users;
        return view('backend.user.index', compact('users'));
    }

    public function userRoleShow()
    {

        $roles = Role::with('permissions')->paginate(10);
        $permissions = Permission::get();

        // return $roles;
        return view('backend.user.role', compact('roles'));
    }
    public function userPermissionShow()
    {
        $permissions = Permission::get();
        $roles = Role::get();
        // foreach ($roles as $role) {
        //     $role->permissions()->attach($permissions->random());
        // }

        // return $permissions;
        return view('backend.user.permission');
    }
}
