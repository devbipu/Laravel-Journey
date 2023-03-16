<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Exceptions\GenaralJsonException;


class UserController extends Controller
{
    public function onLogin(Request $request)
    {
        $request->validate([
            'email'         => 'required|email',
            'password'      => 'required',
            'device_name'   => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw new GenaralJsonException('login credential dosent match', 422);
            // throw ValidationException::withMessages([
            //     'email' => ['The provided credentials are incorrect.'],
            // ]);
        }
 
        $token =  $user->createToken($request->device_name)->plainTextToken;

        return ['token' => $token];
    }
}
