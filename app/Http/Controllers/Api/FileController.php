<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\UserResource;

use App\Models\User;

class FileController extends Controller
{
    public function upload(Request $request)
    {

        $avt = $request->file('avt');

        //copy file
        // return Storage::copy('/images/GQuXCbyaQUhjTKN3TU7hUBkZx5Sd4gHuTaJAZRRY.png', 'public/GQuXCbyaQUhjTKN3TU7hUBkZx5Sd4gHuTaJAZRRY.png');
        //delete file
        // return Storage::delete('public/GQuXCbyaQUhjTKN3TU7hUBkZx5Sd4gHuTaJAZRRY.png');
        
        // Downlod file
        // return Storage::download('public/GQuXCbyaQUhjTKN3TU7hUBkZx5Sd4gHuTaJAZRRY.png');
    }

    public function getData(Request $request) 
    {
        return UserResource::collection(User::get());   
    }

    public function showUser(Request $request, User $user) 
    {
        return new UserResource($user);
    }



    public function updateUser(Request $req)
    {
        // return $req->all();
        $user = User::findOrFail($req->id);
        $user->name = $req->name;
        $user->update();


        return $user;
    }
}
