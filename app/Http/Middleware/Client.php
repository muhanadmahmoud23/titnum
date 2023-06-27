<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Client
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if(getRole() == 'client'){
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
