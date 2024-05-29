<?php
namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    public function handle(Request $request, Closure $next, $level): Response 
    {
        if (Auth::user()->level == $level){
            
            return $next($request); 
        }
        return $next($request);
    }
}

