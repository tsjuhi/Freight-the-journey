<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Member;
use Session;

class LoginController extends Controller
{


    public function post_login(Request $request)
{
    // Validate the input fields
    $attributes = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Check if "Remember Me" is selected
    $remember = $request->has('remember');

    // Attempt to authenticate the user with the 'webmember' guard
    if (Auth::guard('webmember')->attempt($attributes, $remember)) {
        // Regenerate session to prevent session fixation attacks
        $request->session()->regenerate();

        // Check user role and status
        $user = Auth::guard('webmember')->user();
        if ($user->role_id == 2 && $user->status == 'active' && $user->verified == '1') {
            return redirect()->route('dashboard-member'); // Redirect to member dashboard
        }

        // If user is not active, log out and show error
        Auth::guard('webmember')->logout();
        return redirect()->route('auth-login-cover')
            ->withErrors(['email' => 'Your account is not active. Please contact support.']);
    }

    // Attempt to authenticate the user with the default guard
    if (Auth::attempt($attributes, $remember)) {
        // Regenerate session to prevent session fixation attacks
        $request->session()->regenerate();

        // Check user role and redirect accordingly
        $user = Auth::user();
        if ($user->role_id == 1) {
            return redirect()->route('app-logistics-dashboard'); // Redirect to admin dashboard
        }

        // Default redirection for other roles
        return redirect()->route('auth-login-cover');
    }

    // Authentication failed: redirect back with error message
    return redirect()->route('auth-login-cover')
        ->withErrors(['email' => 'The provided credentials could not be verified.'])
        ->withInput($request->except('password')); // Retain email but clear password
}


    public function post_logout(Request $request)
    {
        if (Auth::guard('webmember')->check()) {
            Auth::guard('webmember')->logout();
        } else {
            auth()->logout();
        }
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
    
    
}
