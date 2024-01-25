<?php

namespace App\Http\Middleware;

use Closure;

class Check
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
        if (!$request->session()->exists('user')) {
            // echo"<script>alert('Anda Harus Login Kembali Ke Halaman Login');window.location=('/')</script>";
            return redirect('/SistemAdmin');
          
        }
        return $next($request);
    }
}
