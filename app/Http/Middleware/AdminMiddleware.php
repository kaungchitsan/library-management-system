<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $adminRoleId = null;

        $adminRole = Role::where('name', 'admin')->first();
        if ($adminRole) {
            $adminRoleId = $adminRole->id;
        }

        if ($request->user()->role_id == $adminRoleId) {
            return $next($request);
        }

        return errorResponse('Unauthorized', 403);
    }
}
