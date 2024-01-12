<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckDirtyWord
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $dirtyWords = ['apple', 'orange'];
        $paras = $request->all()['content'];
        if(in_array($paras, $dirtyWords)){
            return response('dirty', 400);
        }
        return $next($request);
    }
}
