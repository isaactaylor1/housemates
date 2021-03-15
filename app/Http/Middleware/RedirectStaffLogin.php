<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\{Request, Response};
use App\Models\Staff\User\User;

class RedirectStaffLogin
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
        $user_id = session('staff_id');
        if (isset($user_id)) {
            if (request()->ajax()) {
                return response()->json([
                 'success' => false,
                ], 401);
            } else {
                return redirect('/');
            }
        }
        return $next($request);
    }
}
