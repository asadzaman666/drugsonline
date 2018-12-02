<?php

namespace App\Http\Middleware;

use Closure;

class profileOwnership
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

        // dd($request->route('id'));
        if($request->route('id') == session('user')->id){

            return $next($request);

        }
        else {

            return back();
        }
    }
}
