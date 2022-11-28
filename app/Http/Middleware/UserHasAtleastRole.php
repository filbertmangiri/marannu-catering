<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;

class UserHasAtleastRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $roleValue)
    {
        $user = $request->user();
        $role = Role::tryFrom($roleValue);

        if (!$user || !$role || $user->role->level() < $role->level()) {
            abort(403);
        }

        return $next($request);
    }
}
