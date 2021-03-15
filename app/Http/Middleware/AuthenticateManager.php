<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\{Request, Response};
use App\Models\Staff\User\User;

class AuthenticateManager
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
            $user = User::where('id', $user_id)->where('manager', 1)->first();
            if ($user) {
                return $next($request);
            }
        }
        if (request()->ajax()) {
            return response()->json([
            'success' => false,
            ], 401);
        } else {
            return redirect('/');
        }
    }
}
