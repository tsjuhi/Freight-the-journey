<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated with the 'webmember' guard
        if (Auth::guard('webmember')->check()) {
            $user = Auth::guard('webmember')->user();

            // Check if the authenticated user has the 'member' role
            if ($user->role_id == 2) {
                return $next($request);
            }

            // Redirect if the user does not have the 'member' role
            return redirect()->route('auth-login-cover')->withErrors('Unauthorized access.');
        }

        // Redirect if not authenticated
        return redirect()->route('auth-login-cover')->withErrors('Please log in as a member.');
    }
}
