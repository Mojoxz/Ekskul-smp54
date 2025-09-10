<?php
// app/Http/Middleware/MuridMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MuridMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || !auth()->user()->isMurid()) {
            return redirect()->route('murid.login')->with('error', 'Access denied');
        }

        if (!session('selected_ekskul_id')) {
            return redirect()->route('murid.login')->with('error', 'Please select ekstrakurikuler');
        }

        return $next($request);
    }
}
