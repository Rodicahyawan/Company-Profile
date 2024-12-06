<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Periksa apakah pengguna memiliki peran yang diberikan
        if (! $request->user() || ! $request->user()->hasRole($role)) {
            // Jika tidak memiliki peran, kembalikan respons 403 (Forbidden)
            abort(403, 'You do not have the required role.');
        }

        return $next($request);
    }
}
