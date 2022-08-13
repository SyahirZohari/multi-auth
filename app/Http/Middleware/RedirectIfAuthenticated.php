<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Support\Facades\Auth;

    class RedirectIfAuthenticated
    {
        public function handle($request, Closure $next, $guard = null)
        {
            if ($guard == "admin" && Auth::guard($guard)->check()) {
                return redirect('/admin');
            }
            if ($guard == "student" && Auth::guard($guard)->check()) {
                return redirect('/student');
            }
            if ($guard == "lecturer" && Auth::guard($guard)->check()) {
                return redirect('/lecturer');
            }
            if ($guard == "hod" && Auth::guard($guard)->check()) {
                return redirect('/hod');
            }
            if ($guard == "industry" && Auth::guard($guard)->check()) {
                return redirect('/industry');
            }
            if ($guard == "coordinator" && Auth::guard($guard)->check()) {
                return redirect('/coordinator');
            }
            if (Auth::guard($guard)->check()) {
                return redirect('/home');
            }

            return $next($request);
        }
    }