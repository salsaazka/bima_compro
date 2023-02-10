<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Guest
{
   
    public function handle(Request $request, Closure $next)
    {
         if(Auth::check()) {
            if(Auth::user()->role == 'admin'){
                return redirect('/dashboard/client')->with('notAllowed', 'Anda sudah login!');
            }else{
                return redirect('/')->with('notAllowed', 'Anda sudah login!');
            }
            //kalau gak ada history login bakal dikembalikan ke halaman login dengan pesan error
           
           }
           return $next($request);      
    }
}
