<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RedirectConsultant
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

        if(Auth::check()){

            //foreach(Auth::user()->role_id as $role){

                if(Auth::user()->category == 'consultant'){

                    return redirect()->route('consultants.consultation.new');

                }
                else{
                    return $next($request);
                }
           // }

        }
        else{
            return redirect()->route('login');
        }
    }
}
