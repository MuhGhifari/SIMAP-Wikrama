<?php 
namespace App\Http\Middleware;

use Closure;

/**
 * 
 */
class CheckGuru
{
	public function handle($request, Closure $next){
		if (!empty(auth()->user)) {
			if (auth()->user()->role == 'guru') {
				return $next($request);
			}
		}

		return redirect()->route('home')->with('error', 'Anda tidak bisa membuka halaman ini');
	}
}

 ?>