<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next , string $role): Response
    public function handle(Request $request, Closure $next ): Response
    {
        echo "<h3>this is middle ware</h3>";
        // echo "<h3>$role</h3>";
        // if(Auth::check()&& Auth::user()->role === $role){
        //     return $next($request);
        //     // return redirect()->route('dashboard');
        // }
        // else{
        //     return redirect()->route('login');
        // }
        if(Gate::denies('isAdmin')){
            abort(403);
        }
        return $next($request);

    }
    public function terminate(Request $request, Response $res): void{
            echo "<h3>this is terminating mideware</h3>";
    }
}
