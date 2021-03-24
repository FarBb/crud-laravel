<?php

namespace App\Http\Middleware;

use Closure;

class cekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!session('berhasil_login')) {
            return redirect('/')->with('massage', 'Silahkan Login Terlebih Dahulu!');
        }
        return $next($request);
    }
}
