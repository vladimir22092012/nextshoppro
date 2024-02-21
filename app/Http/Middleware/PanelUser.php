<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PanelUser
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()) {
            return redirect('/');
        }

        if ($request->user()->role->name == Role::ROLE_USER) {
            return redirect('/');
        }

        return $next($request);
    }
}
