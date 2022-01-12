<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('admin.login');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        if (!auth('admin')->id()) {
            return redirect(route('admin.login'));
        }

        return $next($request);
    }
}
