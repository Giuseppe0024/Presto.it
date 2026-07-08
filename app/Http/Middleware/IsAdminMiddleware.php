<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin) {

            return $next($request);
        }

        return redirect()->route('homepage')->with('error', 'Zona riservata agli amministratori');

        //        abort(403);
    }
}
