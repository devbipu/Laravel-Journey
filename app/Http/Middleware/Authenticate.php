<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use App\Exceptions\GenaralJsonException;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        throw new GenaralJsonException('Login credential dosent match', 422);
        return $request->expectsJson() ? null : route('login');
    }
}
