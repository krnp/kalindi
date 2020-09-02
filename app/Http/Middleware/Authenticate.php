<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class Authenticate
{	
    public function handle($request, Closure $next)
	{
		//check here if the user is authenticated
		if (Auth::guest()) {
		 //is a guest so redirect
		 return redirect('login');
		}
	}
}