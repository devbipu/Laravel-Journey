<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class RoleManageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission= null): Response
    {
        // $user = Auth::user();
        if (!$request->user()->role) {
            abort(404);
        };

        if ($request->user()->role->permissions != null && !$request->user()->can($permission)) {
            abort(404);
        }
        return $next($request);
    }
}
