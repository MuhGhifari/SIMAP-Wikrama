<?php 
namespace App\Http\Middleware;

use Closure;

/**
 * 
 */
class CheckAdmin
{
	public function handle($request, Closure $next){
		if (!empty(auth()->user())) {
			if (auth()->user()->role == 'admin') {
				return $next($request);
			}
		}
		return redirect()->route('login')->with('error', 'Anda tidak mempunyai akses untuk halaman ini');	
	}
}
 ?>