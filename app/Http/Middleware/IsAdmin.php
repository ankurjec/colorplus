<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->is_admin == 1) {
            return $next($request);
        }

        // return redirect('index')->with('error','You dont have admin access.');
        return redirect()->route('index');

    }
}
