<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HocSinhAccess
{
  
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->accounttype == 2) {
            return redirect()->route('showClass')->with('message','URL không hoạt động!!!');
        }
        if (Auth::user()->accounttype == 1) {
            return redirect()->route('Admin')->with('message','URL không hoạt động!!!');
         }
        if (Auth::user()->accounttype == 3) {
            return $next($request);
        }
        if (Auth::check()==false) {
            return redirect()->route('Login');
        }     
    }
}