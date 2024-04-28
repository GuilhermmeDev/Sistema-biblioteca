<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->level) {
            return $next($request);
        }
        else if(auth()->check() == false) {
            return redirect('/login')->with('Error', 'Faça o login para acessar a página');
        }

        return redirect('/')->with('Error', 'Você não tem permissão de acessar essa página');
    }
}
