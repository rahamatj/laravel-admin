<?php

namespace App\Http\Middleware;

use Closure;

class Role
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
        if($request->user() === null) {
            return redirect()->route('admin.login')
                ->with('alert-danger', 'Please log in first, thanks!');
        }

        if($request->user()->hasPermission($request->route()->getName())) {
            return $next($request);
        }

        return redirect()->route('admin.dashboard')
            ->with('alert-danger', 'Insufficient permission!');
    }
}
