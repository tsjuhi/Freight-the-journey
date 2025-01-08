<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SessionController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:members,email']);

        $member = Member::where('email', $request->email)->first();
        if (!$member) {
            return back()->with('error', 'Email Address Not Found.');
        }
        // Generate a token
        $token = Str::random(60);

        // Save the token in the password_resets table
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            ['token' => Hash::make($token),
             'created_at' => now()]
        );

        // Send the reset link email
       
        $resetUrl = route('auth-reset-password-cover', ['token' => $token, 'email' => $request->email]);
        Mail::to($request->email)->send(new \App\Mail\MemberResetPasswordMail($member, $resetUrl));
    if($member){
        return back()->with('status', 'A reset link has been sent to your email address.');
    }else{
        return back()->with('error', 'Email Address Not Found.');
    }
}

   

public function resetPassword(Request $request)
{
    $request->validate([
        'password' => 'required|min:8',
        'confirm-password' => 'required|same:password|min:8',
        'token' => 'required'
    ]);

    // Verify the token
    $passwordReset = DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->first();

    if (!$passwordReset || !Hash::check($request->token, $passwordReset->token)) {
        return back()->withErrors(['email' => 'Invalid token!']);
    }

    // Update the password
    $member = Member::where('email', $request->email)->first();

    if ($member) {
        $member->password = Hash::make($request->password);
        $member->save();
       
    }

  

    // Delete the token
    DB::table('password_reset_tokens')->where('email', $request->email)->delete();

    return redirect()->route('auth-login-cover')->with('status', 'Your password has been reset successfully!');
}
}
