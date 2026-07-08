<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsReviser
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_revisor) {

            return $next($request);
        }

        return redirect()->route('homepage')->with('error', 'Zona riservata ai revisori');

        /*
        per evitare enumeration attack sarebbe meglio abort(404) o al massimo abort(403), ma abbiamo iniziato con questo standard di feedback ui, quindi l'ho tenuto pure nel middleware isAdmin
        */

    }
}
