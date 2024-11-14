<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Documented
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
        $user = Auth::user();


        if(!$user->category){
            return redirect()->route('users.user_category');
        }

        if(!$user->documented_at)
        {
            if($user->category == 'individual')
            {
                return redirect()->route('users.individual.create');
            }
            if($user->category == 'organization')
            {
                return redirect()->route('users.organisation.create');
            }
            if($user->category == 'orphanage')
            {
                return redirect()->route('users.orphanage.create');
            }

        }

        return $next($request);
    }
}
