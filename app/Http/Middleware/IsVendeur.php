<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsVendeur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est authentifié et a le rôle 'vendeur'
        if (Auth::check() && Auth::user()->role->nom === 'vendeur') {
            return $next($request); // Autorise la requête si c'est un vendeur
        }

        // Redirige l'utilisateur s'il n'est pas un vendeur
        return redirect()->route('index')->with('error', 'Accès réservé aux vendeurs.');
    }
}
