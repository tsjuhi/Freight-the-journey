<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;



class VerificationController extends Controller
{
   
    
    public function verifyEmail(Request $request, $id)
    {
        $user = Member::where('id', $id)->firstOrFail();
       
        $user->verified = true; 
        $user->email_verified_at = now();
        if ($user->save()) {
            return redirect('/')->with('status', 'Email verified successfully.');
        } else {
            return redirect('/')->with('error', 'Failed to verify email. Please try again.');
        }
        

    }

    public function approveMember($id)
    {
        $member = Member::find($id);
        
        if ($member) {
            $member->status = 'active'; 
            $member->save();
    
            return redirect('/')->with('status', 'Member account activated successfully.');
        }
    
        return redirect('/')->with('error', 'Member not found.');
    }
    
    public function resendVerification()
    {
        $user = auth()->guard('webmember')->user(); // Authenticate using the 'webmember' guard
    
        // Ensure the user is logged in and has role ID 2
        if (!$user || $user->role_id != 2) {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }
    
        // Check if the email is already verified
        if ($user->hasVerifiedEmail()) {
            return redirect()->back()->with('message', 'Your email is already verified.');
        }
    
        // Generate the verification URL
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify', // Route name
            now()->addMinutes(60), // Expiration time
            ['id' => $user->id, 'guard' => 'webmember'] // Include guard in the parameters if needed
        );
    
        // Send the verification email
        Mail::to($user->email)->send(new VerificationMail($user, $verificationUrl));
    
        return redirect()->back()->with('message', 'Verification link has been resent to your email.');
    }
    

}
