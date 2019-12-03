<?php 
namespace App\Http\Middleware;

use Closure;

/**
 * 
 */
class CheckSuperAdmin
{
	public function handle($request, Closure $next){
		if (!empty(auth()->user())) {
			if (auth()->user()->role 	
		}

		return redirect()->route('home')->with('error', 'Anda tidak mempunyai akses untuk halaman ini');
	}
}

 ?>