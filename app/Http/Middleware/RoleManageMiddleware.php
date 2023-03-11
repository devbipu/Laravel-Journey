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
    public function handle(Request $request, Closure $next, $permission = null): Response
    {
        // dd($request->user()->role->permissions);

        // $user = Auth::user();
        if (!$request->user()->role) {
            abort(403, "You dont't have enaugh access");
        };        
        if ($permission != null && !$request->user()->can($permission)) {
            abort(403, "You dont't have enaugh access");
        }
        return $next($request);
    }
}
