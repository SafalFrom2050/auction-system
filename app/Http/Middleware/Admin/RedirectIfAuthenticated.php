<?php

namespace App\Http\Middleware\Admin;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (auth('admin')->id()) {
            return redirect(route('admin.index'));
        }

        return $next($request);
    }
}
